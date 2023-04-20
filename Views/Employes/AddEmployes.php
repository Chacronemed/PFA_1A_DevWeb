<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ADDEmpl/SignInCss.css">

</head>
<body>
<div>
<div class="content">
         <div class="text">
            Register
         </div>
         <form action="ADDphp.php" method="post">
            
            <div class="field">
                <input required="" type="text" class="input" name="Nom">
                <label class="label">Nom</label>
            </div>
            <div class="field">
                <input required="" type="text" class="input" name="Prenom">
                <label class="label">Prenom</label>
            </div>
            <div class="field">
               <input required="" type="email" class="input" name="Email">
               <label class="label">Email</label>
            </div>
            <div class="field">
                <input required="" type="password" class="input" name="Password">
                <label class="label">Password</label>
             </div>
            <div class="field">
                <input required="" type="number" class="input" name="Telephone">
                <label class="label">Telephone</label>
            </div>
            <div class="field">
                <input required="" type="text" class="input" name="Type_user">
                <label class="label">Type: US or AD</label>
            </div>
            <button class="button">Sign in</button>
         </form>
      </div>
</div>
</body>