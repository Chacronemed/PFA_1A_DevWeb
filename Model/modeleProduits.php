<?php
class modeleProduit{
    private $db;
    public function __construct()
    {
        $this->db= new PDO('mysql:host=localhost;dbname=gestionstock',"root","");
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function ShowAll(){
        $query=$this->db->prepare("SELECT * From produits");
        $query->execute();
        return $query;
    }

    //tout les produits groupé par nom
    public function getAllProduits()
    {
        $query = $this->db->prepare('SELECT Nom, ID_Cat, ID_Produit FROM produits GROUP BY Nom');
        $query->execute();
        $produits = $query->fetchAll(PDO::FETCH_ASSOC);
        return $produits;
    }
    //tout les produit ayant un meme nom
    public function getProduitsByName($name)
    {
        $query = $this->db->prepare('SELECT Nom, ID_Cat, ID_Produit FROM produits WHERE Nom = :name');
        $query->bindParam(':name', $name);
        $query->execute();
        $produits = $query->fetchAll(PDO::FETCH_ASSOC);
        return $produits;
    }
    
    public function getProduitDetails($id)
    {
        $query = $this->db->prepare('SELECT * FROM produits WHERE ID_Produit = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $produit = $query->fetch(PDO::FETCH_ASSOC);
        return $produit;
    }
}