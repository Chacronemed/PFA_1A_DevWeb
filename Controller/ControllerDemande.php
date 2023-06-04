<?php
require_once '../Model/modeleDemande.php';

 class ControllerDemande{
     
    private $modele;
    private $modeleproduit;
    private $action;

    public function __construct()
    {
        $this->modele=new modeleDemande;
        $action = 'all';
    }

    public function AlldemandeAction(){
        $demandes=$this->modele->Alldemande();
        require_once '../../1A_PFA/Views/Demande/demande.php';

    }

    public function action(){
      $action='all';
      if(isset($_GET['action'])){
        $action=$_GET['action'];}
       if(isset($_POST['action'])){
        $action=$_POST['action'];}
       if(isset($action)) {
        switch($action){
            case 'all':
                $this->AlldemandeAction();
                break;
        }

        }

    }
}
$c=new ControllerDemande;
$c->action();