<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AddEmploye/CSSaddempl.css">

</head>
<body><!--NOM PRENOM EMAIL PASSWORD TELEPHONE TYPEUSER-->
<div class="login-box">
 
  <form action="../../../../1A_PFA/Controller/ControllerEmploye.php?action=add" method="POST">
  <div class="user-box">
            <input type="text" name="Nom" required="">
            <label>Nom</label>
        </div>
        <div class="user-box">
            <input type="text" name="Prenom" required="">
            <label>Prenom</label>
        </div>
        <div class="user-box">
            <input type="email" name="Email" required="">
            <label>E-Mail</label>
        </div>
        <div class="user-box">
            <input type="password" name="Password" required="">
            <label>Password</label>
        </div>
        <div class="user-box">
            <input type="number" name="Telephone" required="">
            <label>numero de Telephone</label>
        </div>
        <div class="user-box">
            <select name="type_user">
                <option value="US">User</option>
                <option value="AD">Admin</option>
            </select>
        </div>
    <center>
     <button>
           Ajouter
       <span></span>
     </button>
    </center>
  </form>
</div>
</body>