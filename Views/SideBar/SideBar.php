<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <!-- <script src="./jspdf.umd.min.js"></script> -->
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../../1A_PFA/Views/SideBar/CSSSIdeBar.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----======== Bootstrap ======== -->
    <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../../1A_PFA/images/logo.png" alt="logo company">
                </span>

                <div class="text logo-text">
                    <span class="name">E-Stock</span>
                    <span class="profession">Gestion du parc<br>infoematique</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" id="searchInput"  placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../../../1A_PFA/Views/Dash/dash4.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../../../1A_PFA/Views/Employes/AllEmployes.php">
                            <i class='bx bxs-user-detail icon'></i>
                            <span class="text nav-text">Employes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../../../1A_PFA/Views/Produits/AllProduits.php">
                            <i class='bx bxs-package icon'></i>
                            <span class="text nav-text">Produits</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../../../1A_PFA/Controller/ControllerAffectation.php">
                            <i class='bx bx-user-check icon'></i>
                            <span class="text nav-text">affectations</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../../../1A_PFA/Controller/ControllerDemande.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../../../1A_PFA/Controller/ControllerHistorique.php">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">historique</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../../1A_PFA/Views/login/index.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>

    <!--<section class="home">
        <div class="text">Dashboard Sidebar</div>
    </section>-->

    <script>
        const searchInput = document.getElementById('searchInput');
        const menuLinks = document.querySelectorAll('.menu-links li');
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });

        searchInput.addEventListener('keyup', function(event) {
        const searchTerm = event.target.value.toLowerCase();

        menuLinks.forEach(function(link) {
            const text = link.textContent.toLowerCase();

            if (text.includes(searchTerm)) {
                link.style.display = 'block';
            } else {
                link.style.display = 'none';
                }
            });
        });
        function highlightSearchTerm(link, searchTerm) {
        const linkText = link.textContent;
        const regex = new RegExp(searchTerm, 'gi');
        const highlightedText = linkText.replace(regex, '<span class="highlighted">$&</span>');
        link.innerHTML = highlightedText;
        }
    </script>