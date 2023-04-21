<?php
require_once __DIR__.'/../Model/modeleProduits.php';
class ControllerProduits{
    private $modeleProduit;

    public function __construct()
    {
        $this->modeleProduit=new modeleProduit();
    }

    public function ShowAllAction(){
        $produits=$this->modeleProduit->ShowAll();
        return $produits;
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
    
    public function affichageProduitDetails($id)
    {
        $produits=$this->modeleProduit->getAllProduits();        
        
        // Load the view to display the product details
        require_once 'viewProduitDetails.php';
    }
}