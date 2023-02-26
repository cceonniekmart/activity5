<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="loginflex">
        <form action="login.php" method="post">
            <h2 id="title">EDUCATION THAT WORKS</h2>
            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <p>Username</p>
            <label>
                <img src="images/user.png">
                <input type="text" id="uname" name="uname" placeholder="User Name">
            </label>
            <p>Password</p>
            <label>
                <img src="images/pw.png">
                <input type="password" id="password" name="password" placeholder="Password">
            </label>
            <button type="submit">Login</button>
            <a class="btn btn-success" href="create.php">
                Register
            </a>
        </form>
        <div>
            <p>NATIONAL</p>
            <p>UNIVERSITY</p>
            <p style="color:blue">FAIRVIEW</p>
        </div>
    </div>

</body>
</html>
