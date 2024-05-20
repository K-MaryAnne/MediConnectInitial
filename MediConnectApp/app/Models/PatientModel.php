<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'User_ID';
    protected $allowedFields = ['User_ID', 'Role_ID', 'First Name', 'Last Name'];
}
