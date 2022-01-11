<?php
    session_start();
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "magazine";
    $conn =  mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['login'])) {
        $enrollNo = $_POST['enrollno'];
        $password = $_POST['password'];
        $sql = "Select password from student where enrollmentNo=\"" . $enrollNo . "\"";
        $pass = mysqli_query($conn, $sql);
        $result= mysqli_fetch_assoc($pass);
        if(strcmp((string)$result["password"],$password)==0) {
            $_SESSION["enroll"] = $enrollNo;
            $_SESSION["isLoggedin"] = true;
              echo "<script type=\"text/javascript\">alert(\"Oh snap! LogIn Successfull!!\");var win = window.open(\"index.php\",\"_SELF\")</script>";
        }
        else {
            echo "<script>alert(\"Login Unsuccessfull :(\");var win = window.open(\"login.html\",\"_self\")</script>";
        }
    }
    mysqli_close($conn);

?>