<?php include "includes/registrationquery.php";
if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($firstname) && !empty(lastname) && !empty(username) && !empty(password)){
        registerUser($firstname, $lastname, $username, $password);
    }else{
        header("Location: index.php");
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./assets/index.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <title>Notes</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>


<nav style="background-color:black">
    <div class="nav-wrapper">
      <a style="padding-left:24px;" href="#" class="brand-logo">Notes</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
      </ul>
    </div>
  </nav>

    <div class="parent valign-wrapper">
    <div class="form-parent">
        <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">

            <h2>REGISTER</h2>

            <!-- <label for="firstname" class="sr-only">First Name</label><br> -->
            <input type="text" name="firstname" id="firstname" class="" placeholder="Rahul"><br>
          
            <!-- <label for="lastname" class="sr-only">Last Name</label><br> -->
            <input type="text" name="lastname" id="lastname" class="" placeholder="Prasad"><br>
                        
            <!-- <label for="username" class="sr-only">Username</label><br> -->
            <input type="text" name="username" id="username" class="" placeholder="satanpr"><br>

            <!-- <label for="password" class="sr-only">Password</label><br> -->
            <input type="password" name="password" id="key" class="" placeholder="Password"><br>
            <button style="width:100%" type="submit" name="submit" id="register-btn" class="btn-large waves-effect waves-light">Register</button>
            <button type="button" style="width:100%" onClick="document.location.href='./includes/loginform.php'" id="already-register-btn" class="btn-large waves-effect waves-light">Already Registered?</button>
        </form>
    </div>
    
    </div>
    


</body>
</html>