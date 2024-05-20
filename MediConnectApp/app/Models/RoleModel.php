<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'Role_ID';
    protected $allowedFields = ['Role_Name', 'Description', 'Created at'];
    protected $useAutoIncrement = true;
}
