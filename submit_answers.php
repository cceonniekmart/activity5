<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['group'])) {
    $Group = $_POST['group'];
    $AnswerBy = $_SESSION['user_name'];
    $Question1 = $_POST['question1'];
    $Question2 = $_POST['question2'];
    $Question3 = $_POST['question3'];
    $Question4 = $_POST['question4'];
    $Question5 = $_POST['question5'];
    $Question6 = $_POST['question6'];
    $Question7 = $_POST['question7'];
    $Question8 = $_POST['question8'];
    $Question9 = $_POST['question9'];
    $Question10 = $_POST['question10'];
    $Question11 = $_POST['question11'];
    $Question12 = $_POST['question12'];

    if (empty($Question1)) {
        header("Location: user.php?error=Answer 1 is required");
        exit();

    }else if(empty($Question2)){
        header("Location: user.php?error=Answer 2 is required");
        exit();

    }else if(empty($Question3)){
        header("Location: user.php?error=Answer 3 is required");
        exit();
        
    }else if(empty($Question4)){
        header("Location: user.php?error=Answer 4 is required");
        exit();

    }else if(empty($Question5)){
        header("Location: user.php?error=Answer 5 is required");

    }else if(empty($Question6)){
        header("Location: user.php?error=Answer 6 is required");
        exit();

    }else if(empty($Question7)){
        header("Location: user.php?error=Answer 7 is required");
        exit();

    }else if(empty($Question8)){
        header("Location: user.php?error=Answer 8 is required");
        exit();

    }else if(empty($Question9)){
        header("Location: user.php?error=Answer 9 is required");
        exit();

    }else if(empty($Question10)){
        header("Location: user.php?error=Answer 10 is required");
        exit();

    }else if(empty($Question11)){
        header("Location: user.php?error=Answer 11 is required");
        exit();

    }else if(empty($Question12)){
        header("Location: user.php?error=Answer 12 is required");
        exit();

    }else{
        $sql = "INSERT INTO `tbl_answers`(`group_num`, `answer_by`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`, `r11`, `r12`) 
            VALUES ('$Group', '$AnswerBy', '$Question1','$Question2', '$Question3','$Question4', '$Question5','$Question6', '$Question7','$Question8', '$Question9','$Question10', '$Question11','$Question12')";

        $result = mysqli_query($conn, $sql);

        if ($result == TRUE) {
            header("Location: user.php?success=New record created succesfully");
                exit();
                if (isset($_GET['error']) || isset($_GET['error'])) {
                    unset($_GET['error']);
                    unset($_GET['success']);
                }
        } else {
            echo "Error:". $sql . "<br>". $conn->error;
        } 

        $conn->close();  
    }
        

}else{
    header("Location: user.php");
    exit();
}

