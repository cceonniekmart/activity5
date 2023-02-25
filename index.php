<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="loginflex">
        <div>
            <p>National University</p>
            <img src="https://upload.wikimedia.org/wikipedia/en/a/a2/National_University_seal.png">
        </div>
        <form action="login.php" method="post">
            <h2 id="title">EDUCATION THAT WORKS</h2>
            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>
                <img src="https://png.pngtree.com/png-vector/20190215/ourmid/pngtree-vector-valid-user-icon-png-image_516298.jpg">
                <input type="text" id="uname" name="uname" placeholder="User Name">
            </label>
            <label>
                <img src="https://png.pngtree.com/png-vector/20190215/ourmid/pngtree-vector-valid-user-icon-png-image_516298.jpg">
                <input type="password" id="password" name="password" placeholder="Password">
            </label>
            <button type="submit">Login</button>
            <a class="btn btn-success" href="create.php">Register</a>
        </form>
    </div>

</body>
</html>
