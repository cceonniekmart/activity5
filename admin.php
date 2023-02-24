<?php 
session_start();
include "db_conn.php";

// check if user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // initialize $Group variable
    $Group = '';

    // check if form is submitted
    if (isset($_POST['group'])) {
        $Group = $_POST['group'];
    }

    // get scores for selected group
    $sql = "SELECT answer_by, qstn1, qstn2 
            FROM tbl_answers 
            WHERE group_num='$Group'
            ORDER BY answer_by ASC";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // fetch rows and store scores for each user
    $scores = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $answer_by = $row['answer_by'];
        $question1_score = $row['qstn1'];
        $question2_score = $row['qstn2'];

        if (!isset($scores[$answer_by])) {
            $scores[$answer_by] = array(
                'question1' => $question1_score,
                'question2' => $question2_score
            );
        } else {
            $scores[$answer_by]['question1'] = $question1_score;
            $scores[$answer_by]['question2'] = $question2_score;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <form method="post">
        <label for="group">Choose a group:</label>
        <select id="group" name="group">
            <option value="Group1"<?php if ($Group == 'Group1') {echo ' selected';} ?>>Group 1</option>
            <option value="Group2"<?php if ($Group == 'Group2') {echo ' selected';} ?>>Group 2</option>
            <option value="Group3"<?php if ($Group == 'Group3') {echo ' selected';} ?>>Group 3</option>
            <!-- add more options for additional groups -->
        </select>
        
        <button type="submit">Confirm</button>
    </form>
    
    <?php if (!empty($scores)): ?>
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
    <?php else: ?>
        <p>Please select a group to view scores.</p>
    <?php endif; ?>

</body>
</html>

<?php 
    mysqli_close($conn); 
} else {
    // redirect to login page if user is not logged in
    header("Location: index.php");
    exit();
}
?>
