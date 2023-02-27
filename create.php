<?php 
    include "db_conn.php";

    if (isset($_POST['submit'])) {
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $UserName = $_POST['user_name'];
        $PassWord = $_POST['password'];
        $Confirm = $_POST['confirm_password'];
        $UserRole = isset($_POST['user_type']) ? $_POST['user_type'] : '';

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
    <title>REGISTER - NUFV</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel = "icon" href ="https://upload.wikimedia.org/wikipedia/en/a/a2/National_University_seal.png" type = "image/x-icon">
</head>
<html>
<body>
    <div class="nu_title">
        <p>NATIONAL UNIVERSITY <span style="color:#FCD323;">FAIRVIEW</span></p>
    </div>
<div class="loginflex">
    <form method="POST">
        <div class="container">
        <h3> <span class="auto-type"></span></h3>
        </div>
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
        <div class="radio-container">
            <label class="radio-inline">
                <input type="radio" name="user_type" value="user"> 
                <span class="radio-label">User</span>
            </label>
            <label class="radio-inline">
                <input type="radio" name="user_type" value="admin"> 
                <span class="radio-label">Admin</span>
            </label> 
        </div>  
        
            <a href="index.php"><img src="images/login.png">Back</a>
            <button type="submit" name="submit"><img src="images/register.png">Create</button>
        


    </form>
    <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/en/a/a2/National_University_seal.png">
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script> 
            var typed= new Typed(".auto-type", {
            strings: ["EDUCATION THAT WORKS.",],
            typeSpeed: 150,
            loop: true 
        })
                 
    </script>
</body>
</html>