<?php
require_once '../Model/modeleAffectattion.php';
require_once '../Controller/ControllerEmploye.php';
require_once '../Controller/ControllerProduits.php';

class ControllerAffectation{
    private $modele;
    private $Empl;
    private $Prod;
    private $action;
    public function __construct()
{
    $this->modele = new modeleAffectation();
    $this->Empl = new controlleurEmploye();
    $this->Prod = new ControllerProduits();
    $this->action = 'all';
}

    public function Affichage(){
        $this->Empl=new controlleurEmploye;
        $this->Prod=new ControllerProduits;
        $employes=$this->Empl->AllEmployesAction()->fetchAll();
        $Produits=$this->Prod->ShowAllAction()->fetchAll();
        require_once '../Views/Affectation/Affectation.php';
    }
    public function AssignAction($employe,$produit){
        $query=$this->modele->Assign($employe,$produit);
        return $query;
    }
    public function action() {
        $action = 'all'; 
    
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } elseif (isset($_POST['action'])) {
            $action = $_POST['action'];
        }
    
        switch ($action) {
            case 'all':
                $this->Affichage();
                break;
            case 'assign':
                $employe=$_POST['employe_id'];
                $produit=$_POST['produit_code'];
                $this->AssignAction($employe,$produit);
                header('Location: ../ControllerAffectation.php?assigncontrol');
                break;
        }
    }
    
}
$c=new ControllerAffectation;
$c->action();