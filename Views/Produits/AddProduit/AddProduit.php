<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AddProduit/CSSAddProduit.css">
    <title>Document</title>
</head>
<body>
<div class="login-box">
  <h2>Ajouter Un Produit</h2>
  <form action="../../../Controller/ControllerProduits.php?action=add" method="POST">
    <div class="user-box">
      <input type="text" name="Nom" required="">
      <label>Nom du Produit</label>
    </div>
    <div class="user-box">
      <input type="number" name="ID_Cat" required="">
      <label>ID de la catégorie</label> <!--needs to be changed to the name of the categorie-->
    </div>
    <div class="user-box">
      <input type="number" min="1" name="Quantité" required="">
      <label>Quantité</label> <!--needs to be changed to the name of the categorie-->
    </div>
    <button>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Ajouter
    </button>
  </form>
</div>
</body>
</html>