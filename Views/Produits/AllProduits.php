<?php 
require_once __DIR__.'/../SideBar/SideBar.php';
require __DIR__.'/../../Controller/ControllerProduits.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

*{
    font-family: 'Poppins', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
}

.container{
    background:var(--body-color);
    padding:15px 9%;
    padding-bottom: 100px;
}

.container .heading{
    text-align: center;
    padding-bottom: 15px;
    color: var(--text-color);
    text-shadow: 0 5px 10px rgba(0,0,0,.2);
    font-size: 50px;
}

.container .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap:15px;
}

.container .box-container .box{
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    background: #fff;
    text-align: center;
    padding:30px 20px;
}

.container .box-container .box img{
    height: 80px;
}

.container .box-container .box h3{
    color:#444;
    font-size: 22px;
    padding:10px 0;
}

.container .box-container .box p{
    color: var(--text-color);
    font-size: 15px;
    line-height: 1.8;
}

.container .box-container .box .btn{
    margin-top: 10px;
    display: inline-block;
    background:#333;
    color:#fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

.container .box-container .box .btn:hover{
    letter-spacing: 1px;
}

.container .box-container .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}
table {
    margin: 0 auto;
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
tr {
    height: 50px;
}

@media (max-width:768px){
    .container{
        padding:20px;
    }
}
</style>
<section class="home">
<div class="container">

    <h1 class="heading">Liste des Produits</h1>

    <div class="box-container">
        <?php $data=new ControllerProduits;
              $produits=$data->affichageProduits();        
        ?>
        <?php foreach ($produits as $produit): ?>
            <div class="box">
                <img src="imageproduit1.png" alt="image produit 1">
                <h3><?=$produit?></h3>
                <?php $detailsProduit=$data->affichageProduitsByName($produit) ?>
                <table>
                 <tr>
                     <th>Nom</th>
                     <th>ID_Produit</th>
                     <th>ID_Cat</th>
                 </tr>
                 <?php foreach ($detailsProduit as $detail): ?>
                     <tr>
                         <td><?= $detail['Nom'] ?></td>
                         <td><?= $detail['ID_Produit'] ?></td>
                         <td><?= $detail['ID_Cat'] ?></td>
                     </tr>
                 <?php endforeach; ?>
                </table>
                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>-->
                <a href="#" class="btn">read more</a>
            </div>
        <?php endforeach; ?>
        
        <!--<div class="box">
            <img src="image/icon-2.png" alt="image produit 1">
            <h3>CSS 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/icon-3.png" alt="">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/icon-4.png" alt="">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/icon-5.png" alt="">
            <h3>JQuery</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/icon-6.png" alt="">
            <h3>React.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>-->

    </div>

</div>
</section>