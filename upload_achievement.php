<?php
session_start();
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
    if(isset($_POST['upload_achievement'])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $event = $_POST['event'];
    $event=str_replace("'","\'",$event);
    $description = $_POST['description'];
    $description=str_replace("'","\'",$description);
    $sql = "insert into achievement (title,description,image) values ('$event','$description','$image')"; 
    $i=mysqli_query($conn, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target )) {
        $last_id = mysqli_insert_id($conn);
        $enroll = $_SESSION['enroll'];
        $sql = "insert into submission (enrollmentNo, id, category) values ('$enroll','$last_id','achievement')";
        if(mysqli_query($conn, $sql)) {
            echo "<script>alert(\"Uploaded Successfully\"); var win = window.open('achievement.php','_SELf'); </script>";
        }
        else {
            echo "<script>alert(\"Upload Unsuccessful\"); var win = window.open('achievement.php','_SELf'); </script>";
        }
    }
}
?>