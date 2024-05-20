<?php

namespace App\Models;

use CodeIgniter\Model;

class NurseModel extends Model
{
    protected $table = 'nurses';
    protected $primaryKey = 'User_ID';
    protected $allowedFields = ['User_ID', 'Role_ID', 'First Name', 'Last Name', 'Years of Experience', 'Rating'];
}
