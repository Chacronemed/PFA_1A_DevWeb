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

$sql = "SELECT Nom, COUNT(*) AS nombre FROM Produits GROUP BY Nom";
$result = $conn->query($sql);

$dataPoints = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoint = array("label" => $row["Nom"], "nombre" => $row["nombre"]);
        array_push($dataPoints, $dataPoint);
    }
}
$sqlProducts = "SELECT COUNT(*) AS totalProducts FROM Produits";
$resultProducts = $conn->query($sqlProducts);
$totalProducts = $resultProducts->fetch_assoc()["totalProducts"];

$sqlEmployees = "SELECT COUNT(*) AS totalEmployees FROM Employes";
$resultEmployees = $conn->query($sqlEmployees);
$totalEmployees = $resultEmployees->fetch_assoc()["totalEmployees"];

$sqlAssignments = "SELECT COUNT(*) AS totalAssignments FROM Affectations";
$resultAssignments = $conn->query($sqlAssignments);
$totalAssignments = $resultAssignments->fetch_assoc()["totalAssignments"];

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

        .container .box .image-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            /* Ratio hauteur/largeur de l'image */
        }

        .container .box .box-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .container .box-container .box .box-title {
            color: var(--text-color);
            font-size: 22px;
            padding: 10px 0;
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

        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 15px;
            margin-top: 30px;
            /* Add margin-top for spacing */
        }

        .box-new1 {
            background-color: #FFC107;
            /* Set background color for the first new box */
        }

        .box-new2 {
            background-color: #FF5722;
            /* Set background color for the second new box */
        }

        .box-new3 {
            background-color: #4CAF50;
            /* Set background color for the third new box */
        }

        .large-number {
            font-size: 40px;
        }
    </style>
</head>

<body>
    <section class="home">
        <div class="container">
            <div class="heading"> Welcome to Dashboard</div>

            <div class="box-container">
                <div class="box">
                    <img src="photo1.png" alt="Photo 1">
                    <h1>Employes</h1>

                    <div class="large-number"><?php echo $totalEmployees; ?></div>


                </div>

                <div class="box">
                    <img src="photo2.png" alt="Photo 2">
                    <h1>Total Produits</h1>
                    <div class="large-number"><?php echo $totalProducts; ?></div>
                </div>

                <div class="box">
                    <img src="photo3.png" alt="Photo 3">
                    <h1>Total Affectations</h1>
                    <div class="large-number"><?php echo $totalAssignments; ?></div>

                </div>
            </div>


            <div class="box-container">
                <div class="box">
                    <img src="pdf.jpg" alt="Image produit">
                    <div class="box-container">
                        <a href="produitpd.php" target="_blank" class="btn btn-primary">Générer la liste PDF des produits</a>
                        <a href="employepd.php" target="_blank" class="btn btn-primary">Générer la liste PDF des employés</a>
                    </div>
                </div>

                <div class="box">
                    <div class="chart-container">
                        <canvas id="stockChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Récupérer les labels et les nombres de produits à partir des données PHP
        var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

        // Récupérer les labels et les nombres de produits à partir des données
        var labels = dataPoints.map(function(dataPoint) {
            return dataPoint.label;
        });
        var quantities = dataPoints.map(function(dataPoint) {
            return dataPoint.nombre;
        });

        // Créer un nouveau graphique
        var ctx = document.getElementById('stockChart').getContext('2d');
        var stockChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de produits',
                    data: quantities,
                    backgroundColor: 'rgb(73, 66, 228)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1 // Pour afficher uniquement des valeurs entières sur l'axe Y
                    }
                }
            }
        });
    </script>

</body>

</html>