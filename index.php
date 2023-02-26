<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="nu_title">
        <p>NATIONAL UNIVERSITY <span style="color:#FCD323;">FAIRVIEW</span></p>
    </div>
    <div class="loginflex">
       
        <form action="login.php" method="post">
            <h2 id="title">EDUCATION THAT WORKS</h2>
            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <p class="input_title">Username</p>
            <label>
                <img src="images/user.png">
                <input type="text" id="uname" name="uname" placeholder="Username">
            </label>
            <p class="input_title">Password</p>
            <label>
                <img src="images/pw.png">
                <input type="password" id="password" name="password" placeholder="Password">
            </label>
            <button type="submit"><img src="images/login.png">Login</button>
            <a class="btn btn-success" href="create.php">
            <img src="images/register.png">Register
            </a>
        </form>
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/en/a/a2/National_University_seal.png">
        </div>
    </div>

</body>
</html>
