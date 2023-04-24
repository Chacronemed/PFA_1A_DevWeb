<?php
class modele{
    private $db;
    public function __construct()
    {
        $this->db= new PDO('mysql:host=localhost;dbname=gestionstock',"root","");
    }
    public function AddNewEmploye($employe){
        $query=$this->db->prepare('INSERT INTO employes VALUES(null,?,?,?,?,?,?);');
        $query->execute([$employe['Nom'],$employe['Prenom'],$employe['Email'],$employe['Password'],$employe['Telephone'],$employe['type_user']]);
    }
    public function allEmployes(){
        $query=$this->db->prepare('SELECT * FROM Employes');
        $query->execute();
        return $query;
    }
    public function AllProduits(){
        $query=$this->db->prepare('SELECT *From Produits');
        $query->execute();
    }
    public function DeleteEmployes($code){
        $query=$this->db->prepare('DELETE FROM employes WHERE ID_Empl=?');
        $query->execute($code);
    }
    public function UpdateEmploye($employe){
        $query=$this->db->prepare('UPDATE employes SET Nom=?, Prenom=?, Email=?, Telephone=?, type_user=? WHERE ID_Empl=?');
        $query->execute([$employe['Nom'],$employe['Prenom'],$employe['Email'],$employe['Telephone'],$employe['type_user'],$employe['ID_Empl']]);
    }
    //ajouter etat de produit.
    //zedt id dyal produit w msse7t qte de stock
    public function UpdateProduit($Produit){
        $query=$this->db->prepare('UPDATE Produits SET Nom=?, WHERE ID_Produit=?');
        $query->execute([$Produit['Nom'],$Produit['ID_Produit']]);
    }

} 