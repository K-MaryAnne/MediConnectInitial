<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['full_name', 'E-mail', 'Password', 'activation_code', 'is_active', 'address', 'phone'];

    public function setActivationCode($userId)
    {
        $activationCode = md5(uniqid(rand(), true));
        $this->update($userId, ['activation_code' => $activationCode]);
        return $activationCode;
    }

    public function verifyActivationCode($code)
    {
        return $this->where('activation_code', $code)->first();
    }

    public function verifyResetToken($token)
    {
        return $this->where('reset_token', $token)->first();
    }

    public function setResetToken($userId)
    {
        $resetToken = md5(uniqid(rand(), true));
        $this->update($userId, ['reset_token' => $resetToken, 'reset_expires' => date('Y-m-d H:i:s', strtotime('+1 hour'))]);
        return $resetToken;
    }
}
