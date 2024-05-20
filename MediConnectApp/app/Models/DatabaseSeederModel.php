<?php

namespace App\Models;

use CodeIgniter\Model;

class DatabaseSeederModel extends Model
{
        public function __construct() {
            parent::__construct();
            $this->load->model('Doctors_model');
            $this->load->model('Nurses_model');
            $this->load->model('Patients_model');
            $this->load->model('Roles_model');
            $this->load->model('Users_model');
            $this->load->model('User_roles_model');
        }
    
        public function index() {
            $this->seed_roles();
            $this->seed_users();
            $this->seed_doctors();
            $this->seed_nurses();
            $this->seed_patients();
            $this->seed_user_roles();
    
            echo 'Database seeded successfully!';
        }
    
        private function seed_roles() {
            $this->Roles_model->db->insert('roles', [
                'Role_Name' => 'Doctor',
                'Description' => 'Medical Doctor'
            ]);
    
            $this->Roles_model->db->insert('roles', [
                'Role_Name' => 'Nurse',
                'Description' => 'Registered Nurse'
            ]);
    
            $this->Roles_model->db->insert('roles', [
                'Role_Name' => 'Patient',
                'Description' => 'Hospital Patient'
            ]);
    
            $this->Roles_model->db->insert('roles', [
                'Role_Name' => 'Admin',
                'Description' => 'System Administrator'
            ]);
        }
    
        private function seed_users() {
            $this->Users_model->db->insert('users', [
                'First Name' => 'John',
                'Last Name' => 'Doe',
                'Other Names' => '',
                'E-mail' => 'john.doe@example.com',
                'Phone Number' => 1234567890,
                'Password' => 'password',
                'Gender' => 'Male',
                'Age' => 30
            ]);
        }
    
        private function seed_doctors() {
            $this->Doctors_model->db->insert('doctors', [
                'User_ID' => 1,
                'Role_ID' => 1,
                'First Name' => 'John',
                'Last Name' => 'Doe',
                'Specialisation' => 'Cardiology',
                'Years of Experience' => 10,
                'Rating' => 5
            ]);
        }
    
        private function seed_nurses() {
            $this->Nurses_model->db->insert('nurses', [
                'User_ID' => 2,
                'Role_ID' => 2,
                'First Name' => 'Jane',
                'Last Name' => 'Smith',
                'Years of Experience' => 5,
                'Rating' => 'Excellent'
            ]);
        }
    
        private function seed_patients() {
            $this->Patients_model->db->insert('patients', [
                'User_ID' => 3,
                'Role_ID' => 3,
                'First Name' => 'Alice',
                'Last Name' => 'Johnson'
            ]);
        }
    
        private function seed_user_roles() {
            $this->User_roles_model->db->insert('user_roles', [
                'User_ID' => 1,
                'Role_ID' => 4
            ]);
        }
    }
    
    

