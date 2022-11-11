<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/img/favicon.ico"/>
  <title>Login form</title>
  <!-- Style -->
  <link rel="stylesheet" href="./assets/styles/style.css">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
  <header>
    <div class="logo">
      <img src="./assets/img/logo.svg" alt="Edusogno logo">
    </div>
  </header>

  <main>
    <div class="form_container">

    <!-- ------------------------------------------------- -->
    <h3>Hai già un account?</h3>
      <?php
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
          };
        };
      ?>
      <form action="./assets/php/login.php" method="post">

        <label for="email">Inserisci l'e-mail</label>
        <input type="email" name="email" required placeholder="name@example.com">

        <label for="password">Inserisci la password</label>
        <input type="password" name="password" id="id_password" required placeholder="Scrivila qui"><i class="fa-solid fa-eye" id="togglePassword"></i>
        
        <input type="submit" name="submit" value="accedi" class="form-btn">
        <p>Non hai ancora un profilo? <a href="./assets/php/register.php">Registrati</a></p>
      </form>

    </div> <!-- /form-container -->

</main>

<script src="./assets/js/script.js"></script>
</body>
</html>