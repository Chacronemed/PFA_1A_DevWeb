<?php
require('../../Controller/ControllerEmploye.php');
require __DIR__."/../SideBar/SideBar.php";
?>
<section class="home"> 
<style>
    table {
        margin: auto;
        width: 90%;
        border-collapse: collapse;
        table-layout: auto;
        justify-content: center;
    }

    th, td {
        padding: 10px;
        text-align: center;
        border: 1px dotted var(--text-color);
    }
    .table_head{
        font-size: 15px;
        color: var(--text-color);
    }
    .table_data{
        font-size: 15px;
        color: var(--text-color);    
    }
    .table_icon{
        border: none;
    }
    /* Increase the font size of the table headers */
    th {
        font-size: 16px;
    }

    /* Increase the height of each row */
    tr {
        height: 50px;
    }
    /*button CSS */
    button {
    padding: 1.3em 3em;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 500;
    color: #000;
    background-color: #fff;
    border: none;
    border-radius: 45px;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
    position: absolute;
    left: 45%; /* Adjust the value as needed */
    top: 50%;
    transform: translateY(-50%);
    }

    button:hover {
    background-color: #23c483;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-7px);
    }

    button:active {
    transform: translateY(-1px);
    }
    .buttonDiv{
    position: relative;
    width: auto;
    height: 100px;
    }
/*end of button css */
</style>

<!-- Add the table code here -->
</style>
<h2 class="text">Tableau des Employes</h2>
 <div>
    
    <?php 
     $data = new controlleurEmploye();
     $employes = $data->AllEmployesAction();
    ?>

    <table>
        <thead>
            <tr>
                <th class="table_head">ID Employe</th>
                <th class="table_head">Nom</th>
                <th class="table_head">Prenom</th>
                <th class="table_head">Email</th>
                <th class="table_head">Telephone</th>
                <th class="table_head">Type utilisateur</th>
                <th class="table_head" style="border: none;">Modifier</th>
                <th class="table_head" style="border: none;">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($employes as $employe): ?>
                <tr>
                    <td class="table_data"><?=$employe['ID_Empl']?></td>
                    <td class="table_data"><?= $employe['Nom']?></td>
                    <td class="table_data"><?= $employe['Prenom']?></td>
                    <td class="table_data"><?= $employe['Email']?></td>
                    <td class="table_data"><?= $employe['Telephone']?></td>
                    <td class="table_data"><?= $employe['type_user']?></td>
                    <td class="table_icon"><a href="../Employes/EditEmploye/EditEmploye.php?code=<?php echo $employe['ID_Empl']; ?>" alt='modifier'><i class='bx bxs-edit-alt' style='color:#20f136' ></i></a></td>
                    <td class="table_icon"><a href="../../../1A_PFA/Controller/ControllerEmploye.php?code=<?php echo $employe['ID_Empl']; ?>&action=delete" alt="delete"><i class="bx bxs-trash" style="color:#20f136"></i></a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
    <div class="buttonDiv">
    <a href="../../../1A_PFA/Views/Employes/AddEmploye/AddEmployes.php"><button>ajouter</button></a>
    </div>
 </div>
</section>
<?php
include_once('Footer.php');
?>
