<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
     <h1 id="title">Hello, <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h1>
     
     <a class="btn btn-danger" href="logout.php">Logout</a>
</body>
</html>

<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>