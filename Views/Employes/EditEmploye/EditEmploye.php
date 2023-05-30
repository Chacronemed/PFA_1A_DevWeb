<?php
require_once ('../../../Controller/ControllerEmploye.php');
$data=new controlleurEmploye;
$id=$_GET['code'];
$employe=$data->SelectEmployeAction($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EditEmploye/CSSEditEmpl.css">

</head>
<body>
<div class="login-box">
  <form action="../../../../1A_PFA/Controller/ControllerEmploye.php?action=edit" method="POST">
    <input type="hidden" name="ID_Empl" value="<?= $employe['ID_Empl'] ?>">
  <div class="user-box">
            <input type="text" name="Nom" required="" value="<?= $employe['Nom'] ?>">
            <label>Nom</label>
        </div>
        <div class="user-box">
            <input type="text" name="Prenom" required="" value="<?=$employe['Prenom'] ?>">
            <label>Prenom</label>
        </div>
        <div class="user-box">
            <input type="email" name="Email" required="" value="<?=$employe['Email'] ?>">
            <label>E-Mail</label>
        </div>
        <div class="user-box">
            <input type="password" name="Password" required="" value="<?=$employe['Password'] ?>" id="password">
            <label>mot de pass</label>          
        </div>
        <div class="user-box">
            <li><label style="padding-top: 0px; color:gray;">afficher le mot de passe</label><input type="checkbox" onclick="togglePassword()"> </li>  
        </div>
        <div class="user-box">
            <input type="number" name="Telephone" required="" value="<?=$employe['Telephone'] ?>">
            <label>numero de Telephone</label>
        </div>
        <div class="user-box">
            <select name="type_user" value="<?=$employe['type_user'] ?>">
                <option value="US">User</option>
                <option value="AD">Admin</option>
            </select>
        </div>
    <center>
     <button>
           modifier
       <span></span>
     </button>
    </center>
  </form>
</div>
</body>
<script>
function togglePassword() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
</script>
