<?php
require_once __DIR__."/../../1A_PFA/Model/modeleEmploye.php";
//variable ...
class controlleurEmploye{
    private $modele;
    private $action;

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

    /*public function AllProduitsAction(){
        $query=$this->modele->AllProduits();
        return $query;
    }*/
    public function DeleteEmployesAction($code){
        $query=$this->modele->DeleteEmployes($code);
        return $query;
    }
    public function SelectEmployeAction(){
        $ID=array($_GET['code']);
        $query=$this->modele->SelectEmploye($ID);
        return $query;
    }
    
    public function UpdateEmployeAction($id){
        $query=$this->modele->UpdateEmploye($id);
        return $query;
    }
    public function action(){
        
        if(isset($_GET['action'])){
         $action=$_GET['action'];}
        if(isset($_POST['action'])){
         $action=$_POST['action'];}
        if(isset($action)) {
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
                break;
            case 'edit':
                $employe=$_POST;
                $this->UpdateEmployeAction($employe);
                header('Location: ../../1A_PFA/Views/Employes/AllEmployes.php');
                break;


         }
        }
    }
}
$c=new controlleurEmploye();
$c->action();