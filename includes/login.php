<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 

    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password =  $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_query = mysqli_query($connection, $query);
        if(!$select_user_query){
            die();
        }

        while($row = mysqli_fetch_array($select_user_query)){
            $db_id = $row['user_id'];
            $db_firstname = $row['first_name'];
            $db_lastname = $row['last_name'];
            $db_username = $row['username'];
            $db_password = $row['password'];
        }

        $password = crypt($password,$db_password);


        if($username !== $db_username && $password!== $db_password){
            header("Location: ../index.php");
        }else if($username == $db_username && $password== $db_password){
            $_SESSION['user_id'] = $db_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['user_role'] = $db_user_role;
            header("Location: ../dashboard");
        }else{
            header("Location: ../index.php");
        }
        
    }
?>