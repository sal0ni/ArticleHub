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
    if(isset($_POST['upload_image'])) {
    $target=basename($_FILES['image']['name']);
    $target=str_replace(' ','|',$target);
    $tmppath="images/".$target;
    $image = $_FILES['image']['name'];
    $title = $_POST['title'];
    $title=str_replace("'","\'",$title);
    $caption = $_POST['caption'];
    $caption=str_replace("'","\'",$caption);
    $sql = "insert into gallery (url,title,caption) values ('$image','$title','$caption')";
    $i=mysqli_query($conn, $sql);

    if($i and move_uploaded_file($_FILES['image']['tmp_name'], $tmppath )) {
       
        $last_id = mysqli_insert_id($conn);
        $enroll = $_SESSION['enroll'];
        $sql = "insert into submission (enrollmentNo, id, category) values ('$enroll','$last_id','gallery')";
        if(mysqli_query($conn, $sql)) {
            echo "<script>alert(\"Uploaded Successfully\"); var win = window.open('gallery.php','_SELf'); </script>";
        }
        else {
            echo "<script>alert(\"Upload Unsuccessful\"); var win = window.open('gallery.php','_SELf'); </script>";
        }
    }
}
?>