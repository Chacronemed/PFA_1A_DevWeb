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
    /*grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));*/
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

.button, .button__icon, .button__text {
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

@media (max-width:768px){
    .container{
        padding:20px;
    }
}



/*stop going backward this is your checkpoint */






</style>
<section class="home">
<div class="container">

    <h1 class="heading">Liste des Produits</h1>
    
    <a href="../Produits/AddProduit/AddProduit.php"><button type="button" class="button">
    <span class="button__text">Ajouter</span>
    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
    </button></a>

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
                     <th>Etat</th>
                 </tr>
                 <?php foreach ($detailsProduit as $detail): ?>
                     <tr>
                         <td><?= $detail['Nom'] ?></td>
                         <td><?= $detail['ID_Produit'] ?></td>
                         <td><?= $detail['ID_Cat'] ?></td>
                         <td><?= $detail['Affectation'] ?></td>
                         <td><a href="../Produits/EditProduit/editProduit.php?code=<?php echo $detail['ID_Produit'];?>" alt="modifier"><i class='bx bxs-edit-alt' style='color:#20f136' ></i></a></td>
                         <td><a href="../../Controller/ControllerProduits.php?action=delete&code=<?php echo $detail['ID_Produit']; ?>" alt="supprimer"><i class="bx bxs-trash" style="color:#20f136"></i></a></td>
                     </tr>
                 <?php endforeach; ?>
                </table>
                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>-->
            </div>
        <?php endforeach; ?>
        

    </div>

</div>
</section>