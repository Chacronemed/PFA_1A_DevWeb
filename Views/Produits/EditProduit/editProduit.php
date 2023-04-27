<?php
require_once '../../../Controller/ControllerProduits.php';
$data=new ControllerProduits;
$produit=$data->SelectProduitAction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EditProduit/CSSEditProduit.css">
    <title>Document</title>
</head>
<body>
<div class="login-box">
  <h2>modifier le Produit</h2>
  <form action="../../../Controller/ControllerProduits.php?action=edit&code=<?php echo $produit['ID_Produit']; ?>" method="POST">
    <input type="hidden" name="ID_Produit" value="<?= $produit['ID_Produit'] ?>">
    <div class="user-box">
      <input type="text" name="Nom" required="" value="<?php echo $produit['Nom']?>">
      <label>Nom du Produit</label>
    </div>
    <div class="user-box">
      <input type="number" name="ID_Cat" required="" value="<?php echo $produit['ID_Cat']?>">
      <label>ID de la catégorie</label> <!--needs to be changed to the name of the categorie-->
    </div>
    <div class="user-box">
      <label>ID de Produit: <?php echo $produit['ID_Produit']?> </label>
    </div>
    <button>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      modifier
    </button>
  </form>
</div>
</body>
</html>