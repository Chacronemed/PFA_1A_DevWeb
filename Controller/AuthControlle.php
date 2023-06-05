<?php
require_once '../Model/EmployeeModel.php';
    class AuthController
    {
        private $model;
    
        public function __construct($model)
        {
            $this->model = new EmployeeModel;
        }
    
        public function login($email, $password)
        {
            $employee = $this->model->getEmployeeByEmail($email);
    
            if ($employee && password_verify($password, $employee['Password'])) {
                // Login successful
                $_SESSION['user_id'] = $employee['ID_Empl'];
                $_SESSION['user_type'] = $employee['type_user'];
                return true;
            }
    
            // Login failed
            return false;
        }
    
        public function logout()
        {
            session_unset();
            session_destroy();
        }
    }
    