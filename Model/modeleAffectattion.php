<?php
class modeleAffectation{
    private $db;
    
    public function __construct(){
        try{
        $this->db=new PDO('mysql:host=localhost;dbname=gestionstock',"root","");
        }catch(Exception $e){
            die('erreur: '.$e->getMessage());
        }
    }
    
    public function Assign($ID_Empl,$ID_Produit){
        $currentDate = date('Y-m-d');
        $query=$this->db->prepare('INSERT INTO affectations Values(NULL,?,?,?)');
        $query->execute([$ID_Empl,$ID_Produit,$currentDate]);
    }
    public function retraite($ID_Produit){
        $currentDate = date('Y-m-d');
        $query = $this->db->prepare('UPDATE affectations SET Date_Retraite = ? WHERE ID_Produit = ?;');
        $query->execute([$currentDate, $ID_Produit]);
    }
        
    }
