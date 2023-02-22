<?php 
    include "db_conn.php";

    if (isset($_POST['submit'])) {
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $UserName = $_POST['user_name'];
        $PassWord = $_POST['password'];
        $Confirm = $_POST['confirm_password'];
        $UserRole = $_POST['user_type']; 

        if (empty($FirstName) || empty($LastName) || empty($UserName) || empty($PassWord) || empty($Confirm) || empty($UserRole)) {
            header("Location: create.php?error=Kindly fill all fields");
            exit();
        } else if ($PassWord != $Confirm){
            header("Location: create.php?error=Password does not match");
            exit();
        } else {
            $sql = "INSERT INTO `tbl_users`(`first_name`, `last_name`, `user_name`, `password`, `user_role`) 
            VALUES ('$FirstName', '$LastName', '$UserName','$PassWord', '$UserRole')"; // modified

            $result = $conn->query($sql);

            if ($result == TRUE) {
                echo "New record created successfully.";
                if (isset($_GET['error'])) {
                    unset($_GET['error']);
                }
            } else {
                echo "Error:". $sql . "<br>". $conn->error;
            } 

            $conn->close(); 
        }
    }
?>



<!DOCTYPE html>
<head>
    <title>Create Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="create.css">
</head>
<html>
<body>

    <h2>CREATE NEW ACCOUNT</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <form action="" method="POST" action="index.php">
  <fieldset>
    <legend>Personal information:</legend>
    First Name:<br>
    <input type="text" name="first_name">
    <br>
    Last Name:<br>
    <input type="text" name="last_name">
    <br>
    Username:<br>
    <input type="text" name="user_name">
    <br>
    Password:<br>
    <input type="password" name="password">
    <br>
    Confirm Password:<br>
    <input type="password" name="confirm_password">
    <br>
    <label class="radio-inline">
      <input type="radio" name="user_type" value="user"> User
    </label>
    <label class="radio-inline">
      <input type="radio" name="user_type" value="admin"> Admin
    </label>
    <input type="submit" name="submit" value="create">

    
  </fieldset>
</form>
<a class="btn btn-info" href="index.php">Go Back</a>

</body>
</html>