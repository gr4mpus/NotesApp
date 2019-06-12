
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/loginform.css">
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
        <form action="login.php" method="post" id="login-form" autocomplete="off">

            <h2>LOGIN</h2>

            <input name="username" type="text" placeholder="Enter Username">

            <input name="password" type="password" placeholder="Enter Password">
            <button style="width:100%" name="login" class="btn-large waves-effect waves-light" type="submit">Login</button>
        </form>
    </div>
    
</div>
</body>
</html>