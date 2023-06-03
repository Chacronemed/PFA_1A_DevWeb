<?php 
require_once __DIR__.'../../SideBar/SideBar.php'
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
  }

  body {
      background: #E3F2FD;
  }

  .select-menu {
      width: 380px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
  }

  .select-menu select.select-btn {
      display: flex;
      height: 75px;
      width: 350px;
      margin-bottom: 30px;
      background: #fff;
      padding: 20px;
      font-size: 18px;
      font-weight: 400;
      border-radius: 8px;
      align-items: center;
      cursor: pointer;
      justify-content: space-between;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
  }

  .select-menu.active select.select-btn i {
      transform: rotate(-180deg);
  }

  .select-menu select.options {
      position: absolute;
      padding: 20px;
      margin-top: 10px;
      border-radius: 8px;
      background: #fff;
      box-shadow: 0 0 3px rgba(0,0,0,0.1);
      display: none;
      width: 380px;
  }

  .select-menu.active select.options {
      display: block;
  }

  .options .option {
      display: flex;
      height: 55px;
      cursor: pointer;
      padding: 0 16px;
      border-radius: 8px;
      align-items: center;
      background: #fff;
  }

  .options .option:hover {
      background: #F2F2F2;
  }

  .option i {
      font-size: 25px;
      margin-right: 12px;
  }

  .option .option-text {
      font-size: 18px;
      color: #333;
  }
    /* button css */
    .btn {
  position: relative;
  font-size: 17px;
  text-transform: uppercase;
  text-decoration: none;
  padding: 1em 2.5em;
  display: block;
    margin: 0 auto;
  border-radius: 6em;
  transition: all .2s;
  border: none;
  font-family: inherit;
  font-weight: 500;
  color: black;
  background-color: white;
  }

  .btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  .btn:active {
  transform: translateY(-1px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }

  .btn::after {
  content: "";
  display: inline-block;
  height: 100%;
  width: 100%;
  border-radius: 100px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all .4s;
  }

  .btn::after {
  background-color: #fff;
  }

  .btn:hover::after {
  transform: scaleX(1.4) scaleY(1.6);
  opacity: 0;
  }

  .label.text {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 30px;
    font-weight: bold;
  }

</style>

<section class="home">

<label class="text label" >Affectation</label>
<form method="POST" action="../../../1A_PFA/Controller/ControllerAffectation.php/?action=assign">
  <div class="select-menu select-menu-1">
    <label class="text" for="employe_id">Employee:</label>
    <select name="employe_id" class="select-btn">
      <option class="option" disabled selected>choisir l'employe</option>
      <?php foreach ($employes as $employe): ?>
        <option class="option" value="<?php echo $employe['ID_Empl']; ?>">
          <?php echo $employe['Nom']." ".$employe['Prenom']." ID: ".$employe['ID_Empl']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="select-menu select-menu-2">
    <label class="text" for="produit_code">Product:</label>
    <select name="produit_code" class="select-btn">
      <option class="option">choisir le produit</option>
      <?php foreach ($Produits as $produit): ?>
        <option class="option" value="<?php echo $produit['ID_Produit']; ?>">
          <?php echo $produit['Nom']." ID: ".$produit['ID_Produit']; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <input type="hidden" name="ID_Produit" value="<?php echo $produit['ID_Produit']; ?>">
  </div>

  <br>
  <div style="text-align: center;">
    <input type="submit" value="Assign" class="btn">
  </div>
</form>
</section>

<style>
  /* Existing styles... */

  .home {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .select-menu {
    margin-bottom: 20px;
  }
</style>
