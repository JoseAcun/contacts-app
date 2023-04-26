
<?php

require "database.php";

$error = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["usuario"]) || empty($_POST["contraseña"])){
      $error = "please filla all the fields";
    // } else if (!str_contains($_POST["email"], "@")){
    //   $error = "Email format is incorrect";
    } else {
      $STATEMEN = $conn->prepare("SELECT * FROM administrador where usuario = :usuario");
      $STATEMEN->bindParam(":usuario", $_POST["usuario"]);
      $STATEMEN->execute();

      if ($STATEMEN->rowCount() > 0) {
        $error = "This username alredy exist";
      } else{
        $conn
          ->prepare("INSERT INTO administrador (usuario, contraseña) VALUES (:usuario, :contraseña)")
          ->execute([
            ":usuario" => $_POST["usuario"],
            // ":email" => $_POST["email"],
            ":contraseña" => password_hash($_POST["contraseña"], PASSWORD_BCRYPT)
          ]);

          $STATEMEN = $conn->prepare("SELECT * FROM administrador where usuario = :usuario LIMIT 1");
          $STATEMEN->bindParam(":usuario", $_POST["usuario"]);
          $STATEMEN->execute();
          $user = $STATEMEN->fetch(pdo::FETCH_ASSOC);

          session_start();
          $_SESSION["usuario"] = $user;

          header("Location: home.php");
      }
      
    }
  }
  
?>
<?php require "partials/header.php" ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
          <?php if ($error): ?>
              <p class="text-danger">
                <?= $error ?>
              </p>
            <?php endif ?>
          
          <form method="post" action="register.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
              </div>
            </div>

            <!-- <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
              </div> -->
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="password" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "partials/footer.php" ?>