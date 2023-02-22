<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['group'])) {
    $Group = $_POST['group'];
    $AnswerBy = $_SESSION['user_name'];

    if (empty($Question1)) {
        header("Location: user.php?error=Answer 1 is required");
        exit();

    }else if(empty($Question2)){
        header("Location: user.php?error=Answer 2 is required");
        exit();

    }else{
        $sql = "SELECT * FROM tbl_answers WHERE group_num='$Group'";

        $result = mysqli_query($conn, $sql);

        if ($result == TRUE) {
            echo "New record created successfully.";
            if (isset($_GET['error'])) {
                unset($_GET['error']);
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