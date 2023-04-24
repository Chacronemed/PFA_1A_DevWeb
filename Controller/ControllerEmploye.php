<?php
require_once __DIR__."/../../1A_PFA/Model/modeleEmploye.php";
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
    public function AddNewEmployesAction($employe){
        $query=$this->modele->addNewEmploye($employe);
        return $query;
    }

    public function AllProduitsAction(){
        $query=$this->modele->AllProduits();
        return $query;
    }
    public function DeleteEmployesAction($code){
        $query=$this->modele->DeleteEmployes($code);
        return $query;
    }
    public function action(){
        $action=$_GET['action'];
        switch($action){
            case 'add':
                $User=$_POST;
                //print_r($User);
                $this->AddNewEmployesAction($User);
                header('Location: ../../1A_PFA/Views/Employes/AllEmployes.php');
                break;
            case 'delete':
                $code=$_GET['code'];
                $this->DeleteEmployesAction(array($code));
                header('Location: ../../1A_PFA/Views/Employes/AllEmployes.php');
        }
    }
}
$c=new controlleurEmploye();
$c->action();