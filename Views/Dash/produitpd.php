<?php
require('C:\xampp\htdocs\FPDF\fpdf.php');

// Connexion à la base de données "gestionstock"
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionstock";

// Connexion à la base de données
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Création du document PDF
$pdf = new FPDF();
$pdf->AddPage();

// Ajouter le logo
//$pdf->Image('estock.jpeg', 10, 10, 30);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Liste des produits', 0, 1);

// Récupération des données des produits depuis la base de données
$stmt = $conn->prepare("SELECT * FROM produits");
$stmt->execute();

// Génération de la liste des produits
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(30, 10, 'ID', 1, 0);
$pdf->Cell(60, 10, 'Nom', 1, 0);
$pdf->Cell(60, 10, 'Categorie', 1, 1);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(30, 10, $row['ID_Produit'], 1, 0);
    $pdf->Cell(60, 10, $row['Nom'], 1, 0);
    $pdf->Cell(60, 10, $row['ID_Cat'], 1, 1);
}

// Envoi du document PDF au navigateur
$pdf->Output();
