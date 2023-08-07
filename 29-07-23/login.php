<?php

include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql query to insert data into table
    $sql = "SELECT * FROM users WHERE email = '$email'";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        //check if there is a record in the db
        $rownumber = mysqli_num_rows($result);
        if($rownumber > 0){
            //fetch the record from the db using associative array
            $row = mysqli_fetch_assoc($result);

            //verify password
            $passwordhash = $row['password'];
            $id = $row['id'];
            $email = $row['email'];
            if(password_verify($password,$passwordhash)){
                //redirect to dashboard

                //create a session
                session_start();
                //store the user id and email in the session variables
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                //redirect to dashboard
                header('location:home.php');
            } 
        }else{
            echo "Invalid Email or Password";

            
                        
        }


        //alternative to fetch the record from the db
        /*if(mysqli_num_rows($result) > 0){
            //fetch the record from the db
            $row = mysqli_fetch_assoc($result);
            //verify password
            if(password_verify($password,$row['password'])){
                //redirect to dashboard
                header('location:dashboard.php');
            } else{
                echo "Invalid Password";
            }
        } else{
            echo "Invalid Email";
        }
    } else{
        die(mysqli_error($connect));
    }
    */
}
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
    <div class="container">
    <h1 class="text-center">Login</h1>
    <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>

<div>Don't have an Account?<a href="signup.php"> Sign Up</a></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</html>