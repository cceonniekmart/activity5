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
<form action="get_admin.php" method="post">
  <label for="group">Choose a group:</label>
  <select id="group" name="group">
    <option value="Group1">Group 1</option>
    <option value="Group2">Group 2</option>
    <option value="Group3">Group 3</option>
    <!-- add more options for additional users -->
  </select>
  
  <button type="submit">Confirm</button>
</form>

</body>
</html>

<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>