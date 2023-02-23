<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['group'])) {
    $Group = $_POST['group'];

    $sql = "SELECT answer_by, qstn1, qstn2 
        FROM tbl_answers 
        WHERE group_num='$Group'
        ORDER BY answer_by ASC";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $scores = array();

    // fetch rows and store scores for each user
    while ($row = mysqli_fetch_assoc($result)) {
        $answer_by = $row['answer_by'];
        $question1_score = $row['qstn1'];
        $question2_score = $row['qstn2'];

        if (!isset($scores[$answer_by])) {
            $scores[$answer_by] = array(
                'qstn1' => $question1_score,
                'qstn2' => $question2_score
            );
        } else {
            $scores[$answer_by]['qstn1'] = $question1_score;
            $scores[$answer_by]['qstn2'] = $question2_score;
        }
    }

    $conn->close();  
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
</head>
<body>
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
                    <td><?php echo $user_scores['qstn1']; ?></td>
                    <td><?php echo $user_scores['qstn2']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php 
} else {
    header("Location: user.php");
    exit();
}
?>
