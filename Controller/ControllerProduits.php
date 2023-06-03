<?php
require_once __DIR__.'/../Model/modeleProduits.php';
class ControllerProduits{
    private $modeleProduit;

    public function __construct()
    {
        $this->modeleProduit=new modeleProduit();
    }

    public function SelectProduitAction(){
        $ID=$_GET['code'];
        $produit=$this->modeleProduit->SelectProduit($ID);
        return $produit;
    }

    public function AddProduitAction($produit){
        $ajout=$this->modeleProduit->AddProduit($produit);
        return $ajout;
    }

    public function ShowAllAction(){
        $produits=$this->modeleProduit->ShowAll();
        return $produits;
    }
    public function ShowAllProdNonAffecterAction(){
        $produits=$this->modeleProduit->ShowAllProdNonAffecter();
        return $produits;
    }
    public function AffectProduitAction($ID){
        $produit=$this->modeleProduit->AffectProduit($ID);
        return $produit;
    }

    public function affichageProduits()
    {   
        $produits=$this->modeleProduit->getAllProduits();        
        // Remove duplicate names from the array
        $unique_names = array_unique(array_column($produits, 'Nom'));
        return $unique_names;
    }
    
    public function affichageProduitsByName($name)
    {
        $produits=$this->modeleProduit->getProduitsByName($name);  
        return $produits;      

    }

    public function DeleteProduitAction($Code){
        $produit= $this->modeleProduit->DeleteProduit($Code);
        return $produit;
    }
    
    public function UpdateProduitAction($produit){
        $stmt=$this->modeleProduit->UpdateProduit($produit);
        return $stmt;
    }

    public function affichageProduitDetails($id)
    {
        $produits=$this->modeleProduit->getAllProduits();        
        
        // Load the view to display the product details
        require_once 'viewProduitDetails.php';
    }
    public function action(){
        
        if(isset($_GET['action'])){
         $action=$_GET['action'];}
        else if(isset($_POST['action'])){
         $action=$_POST['action'];}
        if(isset($action)) {
         switch($action){
            case 'add':
                $produit=$_POST;
                //print_r($User);
                $this->AddProduitAction($produit);
                header('Location: ../Views/Produits/AllProduits.php');
                break;
            case 'delete':
                $code=$_GET['code'];
                $this->DeleteProduitAction(array($code));
                header("Location: ../Views/Produits/AllProduits.php?");
                break;
            case 'edit':
                $employe=$_POST;
                $this->UpdateProduitAction($employe);
                header('Location: ../Views/Produits/AllProduits.php');
                break;


         }
        }
    }
}
$c=new ControllerProduits;
$c->action();