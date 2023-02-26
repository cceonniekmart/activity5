<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>
<form action="submit_answers.php" method="post">
  <div class="group">
    <label for="group">Choose a group:</label>
    <select id="group" name="group">
      <option value="RFG">RFG</option>
      <option value="HOPPY BUNNIES">HOPPY BUNNIES</option>
      <option value="VINATHLETICS">VINATHLETICS</option>
      <option value="THE Cs ACCESSORIES">THE C'S ACCESSORIES</option>
      <option value="YARN DREAMS">YARN DREAMS</option>
      <option value="CC EONNIE MINI STORE">CC EONNIE MINI STORE</option>
    </select>
  </div>
  
  
  <h2>Rubrics for group project:</h2>
  

  <div class="rubrics">
  <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
  <?php if (isset($_GET['success'])) { ?>
      <p class="success"><?php echo $_GET['success']; ?></p>
  <?php } ?>
    <div class="question">
      
      <p>Rubrics 01: <span style="font-weight: 1000;">Content</span></p>
      
      <input type="radio" name="question1" id="q1a1" value="0.00">
      <label for="q1a1">1</label>
      
      <input type="radio" name="question1" id="q1a2" value="1.25">
      <label for="q1a2">2</label>
      
      <input type="radio" name="question1" id="q1a3" value="2.50">
      <label for="q1a3">3</label>
      
      <input type="radio" name="question1" id="q1a4" value="3.75">
      <label for="q1a4">4</label>
      
      <input type="radio" name="question1" id="q1a5" value="5.00">
      <label for="q1a5">5</label>
      </div>
      
      <div class="question">
      <p>Rubrics 02: <span style="font-weight: 1000;">Content Accuracy</span></p>
      
      <input type="radio" name="question2" id="q2a1" value="0.00">
      <label for="q2a1">1</label>
      
      <input type="radio" name="question2" id="q2a2" value="1.25">
      <label for="q2a2">2</label>
      
      <input type="radio" name="question2" id="q2a3" value="2.50">
      <label for="q2a3">3</label>
      
      <input type="radio" name="question2" id="q2a4" value="3.75">
      <label for="q2a4">4</label>
      
      <input type="radio" name="question2" id="q2a5" value="5.00">
      <label for="q2a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 03: <span style="font-weight: 1000;">Layout</span></p>
      
      <input type="radio" name="question3" id="q3a1" value="0.00">
      <label for="q3a1">1</label>
      
      <input type="radio" name="question3" id="q3a2" value="1.25">
      <label for="q3a2">2</label>
      
      <input type="radio" name="question3" id="q3a3" value="2.50">
      <label for="q3a3">3</label>
      
      <input type="radio" name="question3" id="q3a4" value="3.75">
      <label for="q3a4">4</label>
      
      <input type="radio" name="question3" id="q3a5" value="5.00">
      <label for="q3a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 04: <span style="font-weight: 1000;">Navigation</span></p>
      
      <input type="radio" name="question4" id="q4a1" value="0.00">
      <label for="q4a1">1</label>
      
      <input type="radio" name="question4" id="q4a2" value="1.25">
      <label for="q4a2">2</label>
      
      <input type="radio" name="question4" id="q4a3" value="2.50">
      <label for="q4a3">3</label>
      
      <input type="radio" name="question4" id="q4a4" value="3.75">
      <label for="q4a4">4</label>
      
      <input type="radio" name="question4" id="q4a5" value="5.00">
      <label for="q4a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 05: <span style="font-weight: 1000;">Links(content)</span></p>
      
      <input type="radio" name="question5" id="q5a1" value="0.00">
      <label for="q5a1">1</label>
      
      <input type="radio" name="question5" id="q5a2" value="1.25">
      <label for="q5a2">2</label>
      
      <input type="radio" name="question5" id="q5a3" value="2.50">
      <label for="q5a3">3</label>
      
      <input type="radio" name="question5" id="q5a4" value="3.75">
      <label for="q5a4">4</label>
      
      <input type="radio" name="question5" id="q5a5" value="5.00">
      <label for="q5a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 06: <span style="font-weight: 1000;">Background</span></p>
      
      <input type="radio" name="question6" id="q6a1" value="0.00">
      <label for="q6a1">1</label>
      
      <input type="radio" name="question6" id="q6a2" value="1.25">
      <label for="q6a2">2</label>
      
      <input type="radio" name="question6" id="q6a3" value="2.50">
      <label for="q6a3">3</label>
      
      <input type="radio" name="question6" id="q6a4" value="3.75">
      <label for="q6a4">4</label>
      
      <input type="radio" name="question6" id="q6a5" value="5.00">
      <label for="q6a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 07: <span style="font-weight: 1000;">Color Choices</span></p>
      
      <input type="radio" name="question7" id="q7a1" value="0.00">
      <label for="q7a1">1</label>
      
      <input type="radio" name="question7" id="q7a2" value="1.25">
      <label for="q7a2">2</label>
      
      <input type="radio" name="question7" id="q7a3" value="2.50">
      <label for="q7a3">3</label>
      
      <input type="radio" name="question7" id="q7a4" value="3.75">
      <label for="q7a4">4</label>
      
      <input type="radio" name="question7" id="q7a5" value="5.00">
      <label for="q7a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 08: <span style="font-weight: 1000;">Fonts</span></p>
      
      <input type="radio" name="question8" id="q8a1" value="0.00">
      <label for="q8a1">1</label>
      
      <input type="radio" name="question8" id="q8a2" value="1.25">
      <label for="q8a2">2</label>
      
      <input type="radio" name="question8" id="q8a3" value="2.50">
      <label for="q8a3">3</label>
      
      <input type="radio" name="question8" id="q8a4" value="3.75">
      <label for="q8a4">4</label>
      
      <input type="radio" name="question8" id="q8a5" value="5.00">
      <label for="q8a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 09: <span style="font-weight: 1000;">Graphics</span></p>
      
      <input type="radio" name="question9" id="q9a1" value="0.00">
      <label for="q9a1">1</label>
      
      <input type="radio" name="question9" id="q9a2" value="1.25">
      <label for="q9a2">2</label>
      
      <input type="radio" name="question9" id="q9a3" value="2.50">
      <label for="q9a3">3</label>
      
      <input type="radio" name="question9" id="q9a4" value="3.75">
      <label for="q9a4">4</label>
      
      <input type="radio" name="question9" id="q9a5" value="5.00">
      <label for="q9a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 10: <span style="font-weight: 1000;">Images</span></p>
      
      <input type="radio" name="question10" id="q10a1" value="0.00">
      <label for="q10a1">1</label>
      
      <input type="radio" name="question10" id="q10a2" value="1.25">
      <label for="q10a2">2</label>
      
      <input type="radio" name="question10" id="q10a3" value="2.50">
      <label for="q10a3">3</label>
      
      <input type="radio" name="question10" id="q10a4" value="3.75">
      <label for="q10a4">4</label>
      
      <input type="radio" name="question10" id="q10a5" value="5.00">
      <label for="q10a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 11: <span style="font-weight: 1000;">Spelling and Grammar</span></p>
      
      <input type="radio" name="question11" id="q11a1" value="0.00">
      <label for="q11a1">1</label>
      
      <input type="radio" name="question11" id="q11a2" value="1.25">
      <label for="q11a2">2</label>
      
      <input type="radio" name="question11" id="q11a3" value="2.50">
      <label for="q11a3">3</label>
      
      <input type="radio" name="question11" id="q11a4" value="3.75">
      <label for="q11a4">4</label>
      
      <input type="radio" name="question11" id="q11a5" value="5.00">
      <label for="q11a5">5</label>
      </div>

      <div class="question">
      <p>Rubrics 12: <span style="font-weight: 1000;">Copyright</span></p>
      
      <input type="radio" name="question12" id="q12a1" value="0.00">
      <label for="q12a1">1</label>
      
      <input type="radio" name="question12" id="q12a2" value="1.25">
      <label for="q12a2">2</label>
      
      <input type="radio" name="question12" id="q12a3" value="2.50">
      <label for="q12a3">3</label>
      
      <input type="radio" name="question12" id="q12a4" value="3.75">
      <label for="q12a4">4</label>
      
      <input type="radio" name="question12" id="q12a5" value="5.00">
      <label for="q12a5">5</label>
      </div>
  </div>
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