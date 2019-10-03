<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
?>


<?php include "../includes/db.php";
    if(isset($_POST['addnote'])){
        $noteTitle = $_POST['notetitle'];
        $noteContent = $_POST['newnote'];

        $noteTitle = mysqli_real_escape_string($connection, $noteTitle);
        $noteContent = mysqli_real_escape_string($connection, $noteContent);

        $query = "INSERT INTO user_notes (user_id,note_title,note_content) VALUES('{$_SESSION['user_id']}','{$noteTitle}','{$noteContent}')";
        $insert_note_query = mysqli_query($connection,$query);
        if(!$insert_note_query){
            echo "NOT INSERTED";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes App Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<nav style="background-color:black">
    <div class="nav-wrapper">
      <a style="padding-left:24px;" href="#" class="brand-logo">Welcome <?php echo $_SESSION['firstname']; ?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../includes/logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="form-parent">
    <form action="index.php" method="post" autocomplete="off">
        <label for="newnote" class="sr-only">Add a new note</label><br>
        <input type="text" name="notetitle" id="notetitle" class="form-control" placeholder="Note Title"><br>
        <input type="text" name="newnote" id="newnote" class="form-control" placeholder="Note Content"><br>
        <input style="margin:auto; display:block;" type="submit" name="addnote"  class="btn btn-custom btn-lg btn-block" value="Add Note">
        
    </form>
</div>


<div class="notes-parent">
<?php
    $read_query = "SELECT * FROM user_notes WHERE user_id = {$_SESSION['user_id']}";
    $read_query_exec = mysqli_query($connection,$read_query);
    // echo implode(",",mysqli_fetch_array($read_query_exec));
    // echo "{sizeof(mysqli_fetch_array($read_query_exec))}";
    while($row= mysqli_fetch_array($read_query_exec)){
        $db_noteTitle = $row['note_title'];
        $db_noteContent = $row['note_content'];

?>

<div class="notes-card z-depth-3">
        <h1 class="notes-title"><?php echo $db_noteTitle ?></h1>
        <p class="notes-content"><?php echo $db_noteContent ?></p>
    </div>

<?php
    }

?>


    
</div>

 <?php
    // $read_query = "SELECT * FROM user_notes WHERE user_id = {$_SESSION['user_id']}";
    // $read_query_exec = mysqli_query($connection,$read_query);
    // // echo implode(",",mysqli_fetch_array($read_query_exec));
    // echo "{sizeof(mysqli_fetch_array($read_query_exec))}";
    // while($row= mysqli_fetch_array($read_query_exec)){
    //     $db_noteTitle = $row['note_title'];
    //     $db_noteContent = $row['note_content'];
    //     echo "<h2>{$db_noteTitle}</h2>";
    //     echo "<h4>{$db_noteContent}</h4>";
    // }

?>
    
</body>
</html>
