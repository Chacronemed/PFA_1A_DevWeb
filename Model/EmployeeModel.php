<?php
    class EmployeeModel
    {
        private $db;

        public function __construct()
        {
            $dsn = 'mysql:host=localhost;dbname=gestionstock';
            $username = 'root';
            $password = '';

            try {
                $this->db = new PDO($dsn, $username, $password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        public function getEmployeeByEmail($email)
        {
            $stmt = $this->db->prepare("SELECT * FROM employes WHERE Email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $employee = $stmt->fetch(PDO::FETCH_ASSOC);
            return $employee;
        }
    }
