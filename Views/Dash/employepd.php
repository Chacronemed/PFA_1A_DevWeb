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

// Styling
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetFillColor(200, 200, 200); // Gris clair
$pdf->SetTextColor(0, 0, 0); // Noir
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 20);

// Ajouter le logo en haut du document
$pdf->Image('estock.jpeg', 80, 20, 50);

$pdf->Ln(40); // Espacement après l'image

$pdf->Cell(0, 10, 'Liste des employes', 0, 1, 'C', true);

// Récupération des données des employés depuis la base de données
$stmt = $conn->prepare("SELECT * FROM Employes");
$stmt->execute();

// Génération de la liste des employés
$pdf->SetFont('Arial', '', 12);

$pdf->SetFillColor(255, 255, 255); // Blanc
$pdf->SetTextColor(0, 0, 0); // Noir

$pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Nom', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Prenom', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Email', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Telephone', 1, 1, 'C', true);

$pdf->SetFillColor(230, 230, 230); // Gris clair

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(30, 10, $row['ID_Empl'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['Nom'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['Prenom'], 1, 0, 'C', true);
    $pdf->Cell(50, 10, $row['Email'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['Telephone'], 1, 1, 'C', true);
}

// Envoi du document PDF au navigateur
$pdf->Output();
