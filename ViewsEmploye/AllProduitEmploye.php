<?php
require_once __DIR__.'/SideBar/NewSideBar.php';

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
    th {
        font-size: 16px;
    }

    /* Increase the height of each row */
    tr {
        height: 50px;
    }
</style>
<h2 class="text">Vos Produits</h2>
<table>
        <thead>
            <tr>
                <th class="table_head">ID Produit</th>
                <th class="table_head">Nom</th>

        </thead>
        <tbody>
            <?php foreach($produits as $produit): ?>
                <tr>
                    <td class="table_data"><?=$produit['ID_Produit']?></td>
                    <td class="table_data"><?= $produit['Nom']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
</section>