<!DOCTYPE html>
<html>

<head>
   <title>
      Login
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      body {
         margin: 0;
         padding: 0;
         background-image: url("estock.jpeg");
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .box {
         background-color: #C4B0FF;

         padding: 20px;
         width: 350px;
         height: 300px;
         border-radius: 10px;
         box-shadow: 0 0 10px 0px rgba(58, 125, 233, 0.5);
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
      }

      .input {
         border: none;
         outline: none;
         border-radius: 15px;
         padding: 1em;
         background-color: #ccc;
         box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
         transition: 300ms ease-in-out;
         width: 100%;
         margin-bottom: 10px;
      }

      .btn-donate {
         --clr-font-main: hsla(0 0% 20% / 100);
         --btn-bg-1: rgb(176, 241, 185);
         --btn-bg-2: rgb(28, 40, 202);
         --btn-bg-color: hsla(360 100% 100% / 1);
         --radii: 0.5em;
         cursor: pointer;
         padding: 0.9em 1.4em;
         min-width: 120px;
         min-height: 44px;
         font-size: var(--size, 1rem);
         font-family: "Segoe UI", system-ui, sans-serif;
         font-weight: 500;
         transition: 0.8s;
         background-size: 280% auto;
         background-image: linear-gradient(325deg, var(--btn-bg-2) 0%, var(--btn-bg-1) 55%, var(--btn-bg-2) 90%);
         border: none;
         border-radius: var(--radii);
         color: var(--btn-bg-color);
         box-shadow: 0px 0px 20px rgba(71, 184, 255, 0.5), 0px 5px 5px -1px rgba(58, 125, 233, 0.25),
            inset 4px 4px 8px rgba(175, 230, 255, 0.5), inset -4px -4px 8px rgba(19, 95, 216, 0.35);
      }

      .btn-donate:hover {
         background-position: center;
      }

      .btn-donate:is(:focus, :focus-within, :active) {
         outline: none;
         box-shadow: 0 0 0 3px var(--btn-bg-color), 0 0 0 6px var(--btn-bg-2);
      }

      @media (prefers-reduced-motion: reduce) {
         .btn-donate {
            transition: linear;
         }
      }

      @media screen and (max-width: 570px) {
         .box {
            width: 65%;
            padding: 40px;
         }
      }
   </style>
</head>

<body>
   <div class="box">
      <h1>Login Estock</h1>
      <form name="form" action="../../Controller/login.php" onsubmit="return isValid()" method="POST">
         <label>Username:</label>
         <input type="email" id="user" class="input" name="user" required><br>
         <label>Password:</label>
         <input type="password" id="pass" class="input" name="pass" required><br>
         <input type="submit" id="btn" class="btn-donate" value="Login" name="submit" />
      </form>
   </div>

   <script>
      function isValid() {
         var user = document.form.user.value;
         var pass = document.form.pass.value;
         if (user.length === 0 && pass.length === 0) {
            alert("Username and password field is empty!");
            return false;
         } else if (user.length === 0) {
            alert("Username field is empty!");
            return false;
         } else if (pass.length === 0) {
            alert("Password field is empty!");
            return false;
         }
      }
   </script>
</body>

</html>