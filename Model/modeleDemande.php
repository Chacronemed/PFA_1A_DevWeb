<?php

    class modeleDemande{
        private $db;

    public function __construct()
    {
        $this->db= new PDO('host:localhost;dbname=gestionstock,"root",""');
    }

    public function Alldemande(){
        $query=$this->db->prepare('SELECT * FROM demande');
        return $query;
    }

    public function Fairedemande(){
        $query=$this->db->prepare()
    }

}