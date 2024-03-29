<?php
require_once '../Model/modeleDemande.php';
require_once '../Model/modeleProduits.php';
require_once '../Model/modeleAffectattion.php';

class ControllerDemande
{
    private $modele;
    private $modeleproduit;
    private $modeleAffectation;
    private $action;

    public function __construct()
    {
        $this->modele = new modeleDemande;
        $this->action = 'all';
    }

    public function AlldemandeAction()
    {
        $demandes = $this->modele->Alldemande();
        require_once '../../1A_PFA/Views/Demande/demande.php';
    }

    public function action()
    {
        $this->action = 'all';
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
        if (isset($_POST['action'])) {
            $this->action = $_POST['action'];
        }
        if (isset($this->action)) {
            switch ($this->action) {
                case 'all':
                    $this->AlldemandeAction();
                    break;
                case 'accept':
                    $name = $_POST['NomProduit'];
                    $this->modeleproduit = new modeleProduit;
                    $ID_Produit = $this->modeleproduit->AffectProduitByname($name);
                    $ID_Demande = $_POST['demande'];
                    $this->modele = new modeleDemande;
                    $this->modele->AcceptDemande($ID_Demande);
                    $this->modeleAffectation = new modeleAffectation;
                    $ID_Empl = $_POST['ID_Empl'];
                    $this->modeleAffectation->Assign($ID_Empl, $ID_Produit);
                    header('Location: ../Controller/ControllerDemande.php');
                    break;
                case 'refus':
                    $ID = $_POST['demande'];
                    $this->modele->refusDemande($ID);
                    header('Location: ../Controller/ControllerDemande.php');
                    break;
                case 'employeDemande':
                    $NomProduit = $_POST['produitNom'];
                    $ID_Empl = $_POST['ID_Empl'];
                    $this->FaireDemandeAction($NomProduit, $ID_Empl);
                    break;
            }
        }
    }

    public function FaireDemandeAction($NomProduit, $ID_Empl)
    {
        $query = $this->modele->Fairedemande($NomProduit, $ID_Empl);
        header('Location: ./ControllerProduits.php?action=demande');
    }
}

$c = new ControllerDemande;

$c->action();
