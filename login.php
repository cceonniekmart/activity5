<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $UserType = $_POST['user_type'];

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();

    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM tbl_users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_role'] = $row['user_role'];
                $_SESSION['id'] = $row['id'];
                if ($_SESSION['user_role'] == 'user') {
                    header("Location: user.php");
                    exit();
                } else {
                    header("Location: admin.php");
                    exit();
                }
               

            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }   
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }   
    }
        

}else{
    header("Location: index.php");
    exit();
}