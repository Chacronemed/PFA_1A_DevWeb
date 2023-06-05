<?php
session_start();
require_once __DIR__.'/SideBar//NewSideBar.php';


print_r($_SESSION);

?>
<section class="home">
    <div>
        <form action="./ControllerDemande.php?action=employeDemande" method="post">
            <input type="hidden" name="ID_Empl" value="<?php echo $_SESSION['user_id'] ?>">
            <label class="text" for="produit_code">choisir votre produit:</label>
            <select name="produitNom" class="select-btn">
            <option class="option">choisir le produit</option>
            <?php foreach ($produits as $produit): ?>
                <option class="option" value="<?php echo $produit['Nom']; ?>">
                <?php echo $produit['Nom'] ?>
                </option>
            <?php endforeach; ?>
            </select>
            <button>Demander</button>
        </form>
    </div>
</section>