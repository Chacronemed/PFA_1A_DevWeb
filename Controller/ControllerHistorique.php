<?php
require_once '../Model/modeleHistorique.php';

class ControllerHistorique{
  private $modele;

  public function __construct()
  {
    $this->modele=new modeleHistorique;
  }

  public function AffichageHistoriqueAction(){
    $affectations=$this->modele->AffichageHistorique();
    require_once '../../1A_PFA/Views/Historique/historique.php';
  }

}
$c=new ControllerHistorique;
$c->AffichageHistoriqueAction();