<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'User_ID';
    protected $allowedFields = ['User_ID', 'Role_ID', 'First Name', 'Last Name', 'Specialisation', 'Years of Experience', 'Rating'];
}

