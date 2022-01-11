<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "magazine";
// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
if(isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $enrollNo = $_POST['enrollno'];
    $password = $_POST['password'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $sql = "INSERT INTO student(enrollmentNo,firstName,lastName,password,branch,year) VALUES (\"" . $enrollNo . "\", \"" . $firstName . "\", \"" . $lastName . "\", \"" . $password . "\", \"" . $branch . "\"," . $year . ")";   
    $insert = mysqli_query($conn, $sql);
    if($insert == true) {
        echo "<script>alert(\"Oh snap! SignIn Successfull!\"); var win = window.open(\"index.php\", \"_self\");</script>";
    }
    else { 
        echo "<script>alert(\"SignIn Unsuccessfull! :(\"); var win = window.open(\"signup.html\", \"_self\");</script>";
    }
}
    mysqli_close($conn);
?>