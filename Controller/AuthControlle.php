<?php
require_once '../Model/EmployeeModel.php';
    class AuthController
    {
        private $model;
    
        public function __construct()
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
        {   if($_SESSION){
            session_destroy();
           }else{
            header('Location: ../Views/Login/index.php');
           }

        }

        public function action(){
            if(isset($_GET['action'])){
                $action=$_GET['action'];}
               if(isset($_POST['action'])){
                $action=$_POST['action'];}
               if(isset($action)) {
                switch($action){
                   case 'out':
                    $this->logout();
                    header('Location: ../Views/Login/index.php');
                    break;
                }
        }
    }
}
    $c=new AuthController();
    $c->action();