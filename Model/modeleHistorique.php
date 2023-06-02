<?php
class modeleHistorique{
    private $db;
    public function __construct()
    {
        $this->db= new PDO("mysql:host=localhost;dbname=gestionstock","root","");
    }

/*SELECT column1, column2, ...
FROM table1
JOIN table2 ON table1.column_name = table2.column_name
JOIN table3 ON table2.column_name = table3.column_name;
 */
    public function AffichageHistorique(){
        $query=$this->db->prepare('SELECT ID_Aff,E.Nom AS EmployeeName,E.Prenom,Affectations.ID_Empl, P.Nom AS ProductName, P.Id_Produit ,Affectations.Date_Aff
        FROM Affectations
        JOIN Employes AS E ON Affectations.ID_Empl = E.ID_Empl
        JOIN Produits AS P ON Affectations.ID_Produit = P.ID_Produit
         ');
        $query->execute();
        $data= $query->fetchAll();
        /*$result = array(
            $data[1]['ID_Aff'],
            $data[1]['EmployeeName']." ".$data[0]['Prenom'],
            $data[1]['ID_Empl'],
            $data[1]['ProductName'],
            $data[1]['Id_Produit'],
            $data[1]['Date_Aff']
        );*/
        return $data;
    }
}
/*$c=new modeleHistorique;
print_r($c->AffichageHistorique());*/