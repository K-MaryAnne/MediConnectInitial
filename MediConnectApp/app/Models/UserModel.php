<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['First Name', 'Last Name', 'Other Names', 'E-mail', 'Phone Number', 'Password', 'Gender', 'Age', 'is_active', 'activation_code', 'reset_token', 'reset_expires'];
    protected $useAutoIncrement = true;

    /*
    <?php

{
    protected $table = 'users';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['First Name', 'Last Name', 'Other Names', 'E-mail', 'Phone Number', 'Password', 'Gender', 'Age'];
    protected $useAutoIncrement = true;
}
 */

 //AUTHENTICATION THING

/*
    public function setActivationCode($userId)
    {
        $code = bin2hex(random_bytes(16));
        $this->update($userId, ['activation_code' => $code]);
        return $code;
    }

    public function verifyActivationCode($code)
    {
        return $this->where('activation_code', $code)->first();
    }

    public function setResetToken($userId)
    {
        $token = bin2hex(random_bytes(16));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $this->update($userId, ['reset_token' => $token, 'reset_expires' => $expires]);
        return $token;
    }

    public function verifyResetToken($token)
    {
        $user = $this->where('reset_token', $token)->first();
        if (!$user || strtotime($user['reset_expires']) < time()) {
            return false;
        }
        return $user;
    }
*/
}