<?php
session_start();
if(!isset($_SESSION['id'], $_SESSION['email'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div>
        <?php 
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        echo "<h1>Welcome. Your user id is $id and your email is $email</h1>";
        ?>
    </div>

    <!--Logout-->
    <button>
        <a href = "logout.php">Logout</a>
    </button>
  </body>

</html>