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
                header("Location: create.php?success=New record created succesfully");
                exit();
                if (isset($_GET['error']) || isset($_GET['error'])) {
                    unset($_GET['error']);
                    unset($_GET['success']);
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<html>
<body>

<div class="loginflex">
    <form method="POST">
        <h2 id="title">EDUCATION THAT WORKS</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        
        <label>
            <img src="images/user.png">
            <input type="text" id="uname" name="first_name" placeholder="First Name">
        </label>
        <label>
            <img src="images/user.png">
            <input type="text" id="password" name="last_name" placeholder="Last Name">
        </label>
        <label>
            <img src="images/email.png">
            <input type="text" id="uname" name="user_name" placeholder="Username">
        </label>
        <label>
            <img src="images/pw.png">
            <input type="password" id="uname" name="password" placeholder="Password">
        </label>
        <label>
            <img src="images/pw.png">
            <input type="password" id="uname" name="confirm_password" placeholder="Confirm Password">
        </label>
        <label class="radio-inline">
            <input type="radio" name="user_type" value="user"> 
            <span class="radio-label">User</span>
        </label>
        <label class="radio-inline">
            <input type="radio" name="user_type" value="admin"> 
            <span class="radio-label">Admin</span>
        </label>    

        <button type="submit" name="submit">Create</button>
    </form>
    <div>
        <p>NATIONAL</p>
        <p>UNIVERSITY</p>
        <p style="color:blue">FAIRVIEW</p>
    </div>
    </div>
</body>
</html>