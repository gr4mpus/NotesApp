<?php include "db.php";

$newConnection = $connection;

function registerUser($firstname, $lastname, $username, $password){
    echo $firstname . $lastname . $username . $password;
    $firstname = mysqli_real_escape_string($GLOBALS['newConnection'], $firstname);
    $lastname = mysqli_real_escape_string($GLOBALS['newConnection'], $lastname);
    $username = mysqli_real_escape_string($GLOBALS['newConnection'], $username);
    $password = mysqli_real_escape_string($GLOBALS['newConnection'], $password);

    $query = "SELECT salt FROM users";
    $salt_query = mysqli_query($GLOBALS['newConnection'],$query);
    
    if(!$salt_query){
       die("Hashing Failed" . mysqli_error($GLOBALS['newConnection']));
    }

    $row = mysqli_fetch_array($salt_query);
    // echo implode("",$row);
    $hash = $row['salt']; 

    $password = crypt($password, $hash);

    $insert_user_query = "INSERT INTO users (username,first_name,last_name,password) VALUES('{$username}','{$firstname}','{$lastname}','{$password}')";
    $register_user_query = mysqli_query($GLOBALS['newConnection'],$insert_user_query);
    if(mysqli_query($GLOBALS['newConnection'],$register_user_query)){
        
    }
    
    if(!$register_user_query){
        die("Query Failed " . mysqli_error($GLOBALS['newConnection']));
    }

    $last_id = mysqli_insert_id($GLOBALS['newConnection']);
    echo $last_id;
    echo "After Last ID";


}

?>
