<?php
class modele{
    private $db;
    public function __construct()
    {
        $this->db= new PDO('mysql:host=localhost;dbname=gestionstock',"root","");
    }
    public function SelectEmploye($ID){
        $query=$this->db->prepare('SELECT * FROM Employes where ID_Empl=?');
        $query->execute($ID);
        return $query->fetch();
    }
    public function AddNewEmploye($employe){
        $query=$this->db->prepare('INSERT INTO employes VALUES(null,?,?,?,?,?,?);');
        $query->execute([$employe['Nom'],$employe['Prenom'],$employe['Email'],password_hash($employe['Password'],PASSWORD_DEFAULT),$employe['Telephone'],$employe['type_user']]);
    }
    public function allEmployes(){
        $query=$this->db->prepare('SELECT * FROM Employes');
        $query->execute();
        return $query;
    }
    /*public function AllProduits(){
        $query=$this->db->prepare('SELECT *From Produits');
        $query->execute();
    }*/
    public function DeleteEmployes($code){
        $query=$this->db->prepare('DELETE FROM employes WHERE ID_Empl=?');
        $query->execute($code);
    }
    public function UpdateEmploye($employe){
        $query=$this->db->prepare('UPDATE employes SET Nom=?, Prenom=?, Password=?, Email=?, Telephone=?, type_user=? WHERE ID_Empl=?');
        $query->execute([$employe['Nom'],$employe['Prenom'],password_hash($employe['Password'],PASSWORD_DEFAULT),$employe['Email'],$employe['Telephone'],$employe['type_user'],$employe['ID_Empl']]);
    }
    //ajouter etat de produit.
    //zedt id dyal produit w msse7t qte de stock
    /*public function UpdateProduit($Produit){
        $query=$this->db->prepare('UPDATE Produits SET Nom=?, WHERE ID_Produit=?');
        $query->execute([$Produit['Nom'],$Produit['ID_Produit']]);
    }*/
    /*partie des employes */

    public function AllProdByEmploye($ID_Empl){
        $query=$this->db->prepare('SELECT p.ID_Produit, p.Nom
        FROM employes AS e
        JOIN affectations AS a ON e.ID_Empl = a.ID_Empl
        JOIN produits AS p ON a.ID_Produit = p.ID_Produit
        WHERE e.ID_Empl = ?;
        ');
        $query->execute([$ID_Empl]);
        return $query->fetchAll();
    }

    public function changePassword($Password,$ID_Empl){
        $query=$this->db->prepare('UPDATE employes SET Password = ? WHERE ID_Empl = ?;');
        $query->execute([password_hash($Password,PASSWORD_DEFAULT),$ID_Empl]);
    }

} 