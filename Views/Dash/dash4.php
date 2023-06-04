<?php
require_once __DIR__ . '/../SideBar/SideBar.php';

// Code PHP pour récupérer les données du stock depuis la base de données
// Remplacez les informations de connexion à la base de données selon vos besoins

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionstock";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$sql = "SELECT Nom, qte_stock FROM Produits";
$result = $conn->query($sql);

$dataPoints = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoint = array("label" => $row["Nom"], "qte_stock" => $row["qte_stock"]);
        array_push($dataPoints, $dataPoint);
    }
}

$conn->close();
?>

<html>

<head>
    <!-- Inclure la bibliothèque Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Style pour le conteneur du graphique */
        .chart-container {
            width: 600px;
            height: 400px;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
    echo '<section class="home">';
    echo '<div class="container">';
    echo '<div class="heading">Dashboard</div>';
    echo '<div class="box-container">';

    echo '<div class="box">';
    echo '<img src="pdf.jpg" alt="Image produit">';
    echo '<div class="box-container"><a href="produitpd.php" target="_blank" class="btn btn-primary">Générer la liste PDF des produits</a>';

    // Liste PDF des employés
    echo '<a href="employepd.php" target="_blank" class="btn btn-primary">Générer la liste PDF des employés</a>';
    echo '</div>';
    echo '</div>';

    echo '<div class="box">';
    echo '<div class="chart-container">';
    echo '<canvas id="stockChart"></canvas>';
    echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</section>';
    ?>

    <script>
        // Récupérer les labels et les quantités de stock à partir des données PHP
        var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

        // Récupérer les labels et les quantités de stock à partir des données
        var labels = dataPoints.map(function(dataPoint) {
            return dataPoint.label;
        });
        var quantities = dataPoints.map(function(dataPoint) {
            return dataPoint.qte_stock;
        });

        // Créer un nouveau graphique
        var ctx = document.getElementById('stockChart').getContext('2d');
        var stockChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantité de stock',
                    data: quantities,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>

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

    .chart-container {
        width: 100%;
        height: 100%;
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
        box-shadow: 10px 10px 5px rgb(119, 136, 153);
        border-radius: 5px;
        background: #fff;
        text-align: center;
        padding: 40px 20px;
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

    }
</style>