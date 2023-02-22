<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="loginflex">
        <form action="login.php" method="post">
            <h2 id="title">LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <button type="submit">Login</button>
            <a class="btn btn-success" href="create.php">Register</a>
        </form>
    </div>

</body>
</html>