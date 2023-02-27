<?php 
session_start();
include "db_conn.php";
include "navbar.php";

// check if user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // initialize $Group variable
    $Group = '';

    // check if form is submitted
    if (isset($_POST['group'])) {
        $Group = $_POST['group'];
    }

    // get scores for selected group
    $sql = "SELECT answer_by, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, total_score
            FROM tbl_answers 
            WHERE group_num='$Group'
            ORDER BY answer_by ASC";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    
    // update total score for each user in tbl_answers
    foreach ($scores as $user => $user_scores) {
        $total_score = array_sum($user_scores);
        $update_sql = "UPDATE tbl_answers SET total_score = $total_score WHERE answer_by = '$user'";
        mysqli_query($conn, $update_sql);
        }
        
    // fetch rows and store scores for each user
    $scores = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $answer_by = $row['answer_by'];
        $question1_score = $row['r1'];
        $question2_score = $row['r2'];
        $question3_score = $row['r3'];
        $question4_score = $row['r4'];
        $question5_score = $row['r5'];
        $question6_score = $row['r6'];
        $question7_score = $row['r7'];
        $question8_score = $row['r8'];
        $question9_score = $row['r9'];
        $question10_score = $row['r10'];
        $question11_score = $row['r11'];
        $question12_score = $row['r12'];
        $total_score = $row['total_score'];

        if (!isset($scores[$answer_by])) {
            $scores[$answer_by] = array(
                'question1' => $question1_score,
                'question2' => $question2_score,
                'question3' => $question3_score,
                'question4' => $question4_score,
                'question5' => $question5_score,
                'question6' => $question6_score,
                'question7' => $question7_score,
                'question8' => $question8_score,
                'question9' => $question9_score,
                'question10' => $question10_score,
                'question11' => $question11_score,
                'question12' => $question12_score,
                'total_score' => $total_score
            );
        } else {
            $scores[$answer_by]['question1'] = $question1_score;
            $scores[$answer_by]['question2'] = $question2_score;
            $scores[$answer_by]['question3'] = $question3_score;
            $scores[$answer_by]['question4'] = $question4_score;
            $scores[$answer_by]['question5'] = $question5_score;
            $scores[$answer_by]['question6'] = $question6_score;
            $scores[$answer_by]['question7'] = $question7_score;
            $scores[$answer_by]['question8'] = $question8_score;
            $scores[$answer_by]['question9'] = $question9_score;
            $scores[$answer_by]['question10'] = $question10_score;
            $scores[$answer_by]['question11'] = $question11_score;
            $scores[$answer_by]['question12'] = $question12_score;
            $scores[$answer_by]['total_score'] = $total_score;
        }
    }

    $sql2 = "SELECT AVG(r1 + r2 + r3 + r4 + r5 + r6 + r7 + r8 + r9 + r10 + r11 + r12) as total
            FROM tbl_answers
            WHERE group_num='$Group'";

    $result2 = mysqli_query($conn, $sql2);
    if (!$result2) {
        die("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result2) === 1) {
        $row = mysqli_fetch_assoc($result2);
        $total_score = $row['total'];
    } else {
        $total_score = 0;
    }

    // get chart data
    $chart_data = array();
    foreach ($scores as $user => $user_scores) {
        $chart_data[] = array(
            'user' => $user,
            'question1' => (double)$user_scores['question1'],
            'question2' => (double)$user_scores['question2'],
            'question3' => (double)$user_scores['question3'],
            'question4' => (double)$user_scores['question4'],
            'question5' => (double)$user_scores['question5'],
            'question6' => (double)$user_scores['question6'],
            'question7' => (double)$user_scores['question7'],
            'question8' => (double)$user_scores['question8'],
            'question9' => (double)$user_scores['question9'],
            'question10' => (double)$user_scores['question10'],
            'question11' => (double)$user_scores['question11'],
            'question12' => (double)$user_scores['question12']
        );
    }

    // generate chart
    echo "<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['User', 'Score'],
            ";
            foreach ($chart_data as $data) {
                echo "['" . $data['user'] . "', " . ($data['question1']  + $data['question2'] + $data['question3'] + $data['question4'] + $data['question5'] + $data['question6'] + $data['question7'] + $data['question8'] + $data['question9'] + $data['question10'] + $data['question11'] + $data['question12']) . "],";
            }
    echo "]);
    
        var options = {
            title: 'Group $Group Scores',
            vAxis: {title: 'Score', format:'#.##'},
            hAxis: {title: 'User'},
            seriesType: 'bars',
            series: {12: {type: 'line'}}

        };
    
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>";


        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<form method="post">
        <div class="group">
            <label for="group">Choose a group:</label>
            <select id="group" name="group">
                <option value="RFG"<?php if ($Group == 'RFG') {echo ' selected';} ?>>RFG</option>
                <option value="HOPPY BUNNIES"<?php if ($Group == 'HOPPY BUNNIES') {echo ' selected';} ?>>HOPPY BUNNIES</option>
                <option value="VINATHLETICS"<?php if ($Group == 'VINATHLETICS') {echo ' selected';} ?>>VINATHLETICS</option>
                <option value="THE Cs ACCESSORIES"<?php if ($Group == 'THE Cs ACCESSORIES') {echo ' selected';} ?>>THE C'S ACCESSORIES</option>
                <option value="YARN DREAMS"<?php if ($Group == 'YARN DREAMS') {echo ' selected';} ?>>YARN DREAMS</option>
                <option value="CC EONNIE MINI STORE"<?php if ($Group == 'CC EONNIE MINI STORE') {echo ' selected';} ?>>CC EONNIE MINI STORE</option>
            </select>
            <button type="submit">Confirm</button>
        </div>
</form>

<table id="header">
    <thead>
    <tr>
        <td><?php echo $Group; ?></td>
        <td>Total: <?php echo $total_score; ?></td>
    </tr>
</table>

<?php if (!empty($scores)): ?>
    <div id="chart_div"></div>
<?php endif; ?>

<?php if (!empty($scores)): ?>
    <table id="data">
        <thead>
            <tr>
                <th>User</th>
                <th>R1</th>
                <th>R2</th>
                <th>R3</th>
                <th>R4</th>
                <th>R5</th>
                <th>R6</th>
                <th>R7</th>
                <th>R8</th>
                <th>R9</th>
                <th>R10</th>
                <th>R11</th>
                <th>R12</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $user => $user_scores): ?>
                <tr>
                    <td><?php echo $user; ?></td>
                    <td><?php echo $user_scores['question1']; ?></td>
                    <td><?php echo $user_scores['question2']; ?></td>
                    <td><?php echo $user_scores['question3']; ?></td>
                    <td><?php echo $user_scores['question4']; ?></td>
                    <td><?php echo $user_scores['question5']; ?></td>
                    <td><?php echo $user_scores['question6']; ?></td>
                    <td><?php echo $user_scores['question7']; ?></td>
                    <td><?php echo $user_scores['question8']; ?></td>
                    <td><?php echo $user_scores['question9']; ?></td>
                    <td><?php echo $user_scores['question10']; ?></td>
                    <td><?php echo $user_scores['question11']; ?></td>
                    <td><?php echo $user_scores['question12']; ?></td>
                    <td><?php echo $user_scores['total_score']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p></p>
<?php endif; ?>

<?php if (!empty($scores)): ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'User');
            data.addColumn('number', 'Question 1');
            data.addColumn('number', 'Question 2');
            data.addColumn('number', 'Question 3');
            data.addColumn('number', 'Question 4');
            data.addColumn('number', 'Question 5');
            data.addColumn('number', 'Question 6');
            data.addColumn('number', 'Question 7');
            data.addColumn('number', 'Question 8');
            data.addColumn('number', 'Question 9');
            data.addColumn('number', 'Question 10');
            data.addColumn('number', 'Question 11');
            data.addColumn('number', 'Question 12');
            <?php foreach ($chart_data as $data) { ?>
                data.addRow(['<?php echo $data['user']; ?>', <?php echo $data['question1']; ?>, <?php echo $data['question2']; ?>, <?php echo $data['question3']; ?>, <?php echo $data['question4']; ?>, <?php echo $data['question5']; ?>, <?php echo $data['question6']; ?>, <?php echo $data['question7']; ?>, <?php echo $data['question8']; ?>, <?php echo $data['question9']; ?>, <?php echo $data['question10']; ?>, <?php echo $data['question11']; ?>, <?php echo $data['question12']; ?>]);
            <?php } ?>

            var options = {
                title: 'Group Scores',
                legend: { position: 'bottom' },
                pieSliceText: 'value',
                slices: {
                    0: { color: 'red' },
                    1: { color: 'blue' }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }

    </script>
<?php endif; ?>
<a href="index.php"><img src="images/login.png">Logout</a>
</body>
</html>