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
    public function AddProduit($produit){
        $query=$this->db->prepare('INSERT INTO produits (ID_Produit, Nom, ID_Cat) VALUES (NULL, ?, ?)');
        $query->execute([$produit['Nom'], $produit['ID_Cat']]);        
        return $query;
    }
    public function SelectProduit($ID){
        $query=$this->db->prepare('SELECT * FROM produits where ID_Produit=?');
        $query->execute(array($ID));
        return $query->fetch();
    }
    public function DeleteProduit($code){
        $query = $this->db->prepare('DELETE FROM produits WHERE ID_Produit = ?');
        $query->execute($code);  
        return $query;
    }
    public function UpdateProduit($produit){
        $query = $this->db->prepare('UPDATE produits SET Nom=?, ID_Cat=? WHERE ID_Produit=?');
        $query->execute([$produit['Nom'], $produit['ID_Cat'], $produit['ID_Produit']]);
    }
    public function ShowAll(){
        $query=$this->db->prepare("SELECT * From produits");
        $query->execute();
        return $query;
    }

    public function ShowAllProdNonAffecter(){
        $query=$this->db->prepare("SELECT * FROM produits WHERE Affectation = 'Non Affecté';");
        $query->execute();
        return $query;
    }
    public function AffectProduit($ID){
        $query=$this->db->prepare("UPDATE produits SET Affectation = 'Affecté' WHERE Affectation = 'Non Affecté' AND ID_Produit = ?; ");
        $query->execute([$ID]);
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
        $query = $this->db->prepare('SELECT Nom, ID_Cat, ID_Produit,Affectation FROM produits WHERE Nom = :name');
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