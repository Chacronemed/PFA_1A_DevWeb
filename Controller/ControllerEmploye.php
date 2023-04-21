<?php
require_once __DIR__."/../Model/modeleEmploye.php";
//variable ...
class controlleurEmploye{
    private $modele;

    public function __construct()
    {
        $this->modele=new modele();
    
    }
    public function AllEmployesAction(){
        $query=$this->modele->allEmployes();
        return $query;
    }
    public function AddNewEmployes($employe){
        $this->modele->addNewEmploye($employe);
    }

    public function AllProduitsAction(){
        $query=$this->modele->AllProduits();
        return $query;
    }
}