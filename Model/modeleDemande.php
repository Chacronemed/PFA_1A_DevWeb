<?php

    class modeleDemande{
        private $db;

    public function __construct()
    {
        $this->db= new PDO('mysql:host=localhost;dbname=gestionstock',"root","");
    }
    /*$query=$this->db->prepare('SELECT ID_Aff,E.Nom AS EmployeeName,E.Prenom,Affectations.ID_Empl, P.Nom AS ProductName, P.Id_Produit ,Affectations.Date_Aff
        FROM Affectations
        JOIN Employes AS E ON Affectations.ID_Empl = E.ID_Empl
        JOIN Produits AS P ON Affectations.ID_Produit = P.ID_Produit
         '); */
         public function Alldemande(){
            $query = $this->db->prepare('SELECT D.ID_Demande, D.NomProduit, D.ID_Empl, E.Nom, E.Prenom AS NomEmploye,(SELECT COUNT(*) FROM produits WHERE Nom = D.NomProduit AND affectation = \'Non Affecté\') AS ProductCount
                FROM demande AS D
                JOIN Employes AS E ON D.ID_Empl = E.ID_Empl
            ');
            $query->execute();
            return $query->fetchAll();
        }
        

    public function Fairedemande($demande){
        $query=$this->db->prepare('INSERT INTO demande VALUES(NULL,?,?); ');
        $query->execute([$demande['NomProduit'],$demande['ID_Empl']]);
    }

}