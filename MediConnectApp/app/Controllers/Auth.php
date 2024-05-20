<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function activate($code)
    {
        $model = new UserModel();
        $user = $model->verifyActivationCode($code);

        if ($user) {
            $model->update($user['User_id'], ['is_active' => 1, 'activation_code' => null]);
            return view('message_view', [
                'title' => 'Account Activated',
                'message' => 'Your account has been activated. You can now log in.'
            ]);
        }

        return view('message_view', [
            'title' => 'Activation Failed',
            'message' => 'Invalid activation code. Please check your email and try again.',
            'link' => site_url('register')
        ]);
    }

    public function requestPasswordReset()
    {
        helper(['form', 'url']);
        $model = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getVar('E-mail');
            $user = $model->where('E-mail', $email)->first();

            if ($user) {
                $resetToken = $model->setResetToken($user['User_id']);
                $emailService = \Config\Services::email();
                $emailService->setTo($user['E-mail']);
                $emailService->setSubject('Password Reset');
                $emailService->setMessage('Please reset your password using the following link: ' . site_url('auth/reset_password/' . $resetToken));
                $emailService->send();
            }

            return view('message_view', [
                'title' => 'Password Reset Requested',
                'message' => 'If the email you provided exists in our system, you will receive a password reset link shortly.'
            ]);
        }

        return view('request_password_reset');
    }

    public function resetPassword($token)
    {
        helper(['form', 'url']);
        $model = new UserModel();
        $user = $model->verifyResetToken($token);

        if (!$user) {
            return view('message_view', [
                'title' => 'Invalid Token',
                'message' => 'The password reset link is invalid or has expired. Please request a new one.',
                'link' => site_url('request_password_reset')
            ]);
        }

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'Password' => 'required|min_length[8]',
                'Confirm Password' => 'matches[Password]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return view('reset_password', ['validation' => $validation, 'token' => $token]);
            }

            $model->update($user['User_id'], ['Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT), 'reset_token' => null, 'reset_expires' => null]);

            return view('message_view', [
                'title' => 'Password Reset Successful',
                'message' => 'Your password has been reset successfully. You can now log in.',
                'link' => site_url('login')
            ]);
        }

        return view('reset_password', ['token' => $token]);
    }
}
