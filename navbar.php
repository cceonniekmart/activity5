<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="navbarcss.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
  <nav>
    <div class="logo">
       <a href="login.php"><img src="images/logo.png"></a>
    </div>
    <div class="container">
        <p>NATIONAL UNIVERSITY <span class="auto-type"></span></p>
    </div>
        
    <div class="txt2">
        <p>Greetings, <span style="color: #FCD323;"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span></p>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    var typed= new Typed(".auto-type", {
        strings: ["FAIRVIEW"],
        typeSpeed: 150,
        loop: true 
    })
    </script>


</body>
</html>