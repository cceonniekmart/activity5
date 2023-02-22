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
<form action="submit_answers.php" method="post">
  <label for="group">Choose a group:</label>
  <select id="group" name="group">
    <option value="Group1">Group 1</option>
    <option value="Group2">Group 2</option>
    <option value="Group3">Group 3</option>
    <!-- add more options for additional users -->
  </select>
  
  <h2>Questions:</h2>
  <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
     <?php } ?>
  
  <div class="question">
    <p>Question 1: How satisfied are you with our product?</p>
    
    <label><input type="radio" name="question1" value="1"> 1 (Not satisfied)</label>
    <label><input type="radio" name="question1" value="2"> 2</label>
    <label><input type="radio" name="question1" value="3"> 3</label>
    <label><input type="radio" name="question1" value="4"> 4</label>
    <label><input type="radio" name="question1" value="5"> 5 (Very satisfied)</label>
  </div>
  
  <div class="question">
    <p>Question 2: How likely are you to recommend our product to a friend?</p>
    <label><input type="radio" name="question2" value="1"> 1 (Not likely)</label>
    <label><input type="radio" name="question2" value="2"> 2</label>
    <label><input type="radio" name="question2" value="3"> 3</label>
    <label><input type="radio" name="question2" value="4"> 4</label>
    <label><input type="radio" name="question2" value="5"> 5 (Very likely)</label>
  </div>
  
  <!-- add more questions here -->
  
  <button type="submit">Submit answers</button>
</form>

</body>
</html>

<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>