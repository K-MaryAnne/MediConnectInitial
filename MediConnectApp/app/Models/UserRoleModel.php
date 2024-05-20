<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = ['User_ID', 'Role_ID'];
    protected $allowedFields = ['User_ID', 'Role_ID', 'Assigned at'];
}
