<?php
require_once __DIR__ . '/../SideBar/SideBar.php';

// Configuration de la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "gestionstock";

// Seuil de quantité de stock
$seuil = 10;

// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête pour récupérer les produits dont la quantité de stock est inférieure ou égale au seuil
$requete = "SELECT Nom, qte_stock FROM Produits WHERE qte_stock <= $seuil";

// Exécution de la requête
$resultat = mysqli_query($connexion, $requete);

// Vérification du résultat de la requête
// ...
if ($resultat && mysqli_num_rows($resultat) > 0) {
    echo '<section class="home">';
    echo '<div class="container">';
    echo '<div class="heading">Notifications</div>';
    echo '<div class="box-container">';

    while ($row = mysqli_fetch_assoc($resultat)) {
        $nomProduit = $row['Nom'];
        $qteStock = $row['qte_stock'];

        echo '<div class="box">';
        echo '<img src="noti.png" alt="Notification Image" class="notification-image">';
        echo '<h3>' . $nomProduit . '</h3>';
        echo '<div class="box-container">Le produit ' . $nomProduit . ' a une quantité de stock de ' . $qteStock . ', ce qui est inférieur ou égal au seuil de ' . $seuil . '.</div><br>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</section>';
} else {
    echo "Aucun produit n'a une quantité de stock inférieure ou égale au seuil de $seuil.\n";
}
// ...

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
        transition: .2s linear;
    }

    .notification-image {
        width: 50px;
        /* Ajustez la taille de l'image selon vos besoins */
        height: 50px;
        margin-right: 10px;
        /* Ajoute une marge à droite de l'image pour l'espacement */

    }


    .container {
        background: var(--body-color);
        padding: 15px 9%;
        padding-bottom: 100px;
    }

    .container .heading {
        text-align: center;
        padding-bottom: 15px;
        color: var(--text-color);
        text-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        font-size: 50px;
    }

    .container .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 15px;
    }

    .container .box-container .box {
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        border-radius: 5px;
        background: #fff;
        text-align: center;
        padding: 30px 20px;
    }

    .container .box-container .box img {
        height: 80px;
    }

    .container .box-container .box h3 {
        color: #444;
        font-size: 22px;
        padding: 10px 0;
    }

    .container .box-container .box p {
        color: var(--text-color);
        font-size: 15px;
        line-height: 1.8;
    }

    .container .box-container .box .btn {
        margin-top: 10px;
        display: inline-block;
        background: #333;
        color: #fff;
        font-size: 17px;
        border-radius: 5px;
        padding: 8px 25px;
    }

    .container .box-container .box .btn:hover {
        letter-spacing: 1px;
    }

    .container .box-container .box:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, .3);
        transform: scale(1.03);
    }

    table {
        margin: 0 auto;
        width: 90%;
        border-collapse: collapse;
        table-layout: auto;
        justify-content: center;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px dotted var(--text-color);
    }

    tr {
        height: 50px;
    }

    .button {
        position: relative;
        width: 150px;
        height: 40px;
        cursor: pointer;
        display: flex;
        margin: 0 auto;
        margin-bottom: 20px;
        align-items: center;
        border: 1px solid #34974d;
        background-color: #3aa856;
    }

    .button,
    .button__icon,
    .button__text {
        transition: all 0.3s;
    }

    .button .button__text {
        transform: translateX(30px);
        color: #fff;
        font-weight: 600;
    }

    .button .button__icon {
        position: absolute;
        transform: translateX(109px);
        height: 100%;
        width: 39px;
        background-color: #34974d;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .button .svg {
        width: 30px;
        stroke: #fff;
    }

    .button:hover {
        background: #34974d;
    }

    .button:hover .button__text {
        color: transparent;
    }

    .button:hover .button__icon {
        width: 148px;
        transform: translateX(0);
    }

    .button:active .button__icon {
        background-color: #2e8644;
    }

    .button:active {
        border: 1px solid #2e8644;
    }

    @media (max-width:768px) {
        .container {
            padding: 20px;
        }
    }
</style>