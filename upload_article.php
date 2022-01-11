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
    echo "<script>alert(\"Connection Error\"); var win = window.open('articles.php','_SELf'); </script>";
}
    if(isset($_POST['upload_article'])) {
    
        $title = $_POST['title'];
        $title=str_replace("'","\'",$title);
        $category = $_POST['category'];
        $editor = $_POST['editor'];
        $editor=str_replace("'","\'",$editor);
        $editor=str_replace("<blockquote>","<blockquote style=\"border-left: 5px solid #b7b7b7;margin:5%;padding:2%;font-style: italic;\">",$editor);
        $sql = "insert into articles (title,text,category) values ('$title','$editor','$category')"; 
        if(mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $enroll = $_SESSION['enroll'];
            $sql = "insert into submission (enrollmentNo, id, category) values ('$enroll','$last_id','article')";
            if(mysqli_query($conn, $sql)) {
                echo "<script>alert(\"Uploaded Successfully\"); var win = window.open('articles.php','_SELf'); </script>";
            }
            else {
                echo "<script>alert(\"Upload Unsuccessful\"); var win = window.open('articles.php','_SELf'); </script>";
            }
        }
        else {
        echo "<script>alert(\"Query Error\"); var win = window.open('articles.php','_SELf'); </script>";
        }
    }
    mysqli_close($conn);
?>