<?php 
session_start();
$scores = array();

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

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Question 1</th>
            <th>Question 2</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($scores as $user => $user_scores): ?>
        <tr>
            <td><?php echo $user; ?></td>
            <td><?php echo $user_scores['question1']; ?></td>
            <td><?php echo $user_scores['question2']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>