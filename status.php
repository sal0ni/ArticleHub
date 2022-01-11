<?php session_start();
$_SESSION['isLoggedin'];
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Status</title>
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
        <div class="container"><a class="navbar-brand text-dark" href="index.php">ArticleHub.com</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link active text-dark" href="index.php">Home <span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="about.php">About</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="articles.php">Articles</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="gallery.php">Gallery</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="achievement.php">Achievements</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="status.php">Status</a></li>
            </ul>
        
             <?php if($_SESSION['isLoggedin']==false) { ?> 
             <button class="btn btn-outline-dark" type="button" onclick="login();">Login</button>
            <?php } 
            else { ?>
             <button class="btn btn-outline-dark" type="button" onclick="logout();">Log Out</button>
             <?php } 
             ?>
          </div>
        </div>
      </nav>
    </header>

    <!--Main Section-->
    <section class="bg-cover bg-center mt-5" id="main" style="background: linear-gradient(#000, transparent), url('img/status.jpg') no-repeat center; 
background-size: cover; height: 20%;">
      <div class="container py-4 index-forward">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-4 text-center my-5 bolded text-white">Status</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="container mt-5 mb-5">
      <header>
        <h1 class="text-dark bolded">Progress</h1>
        <hr>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 my-4 d-flex justify-content-center justify-content-md-start">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Title</th>
                  <th scope="col">Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                            
              $sql = "select id,category from submission where enrollmentNo= \"" . $_SESSION["enroll"] . "\"";
              $select = mysqli_query($conn, $sql);
              if (mysqli_num_rows($select) > 0)  { 
                $count=1;
                while($row = mysqli_fetch_assoc($select)) {
                  if($row['category'] == "article") {
                    $sql = "select title,status from articles where id=" . $row['id'] ;
                  }
                  elseif($row['category'] == "achievement") {
                    $sql = "select title,status from achievement where id=" . $row['id'] ;
                  }
                  elseif($row['category'] == "gallery") {
                    $sql = "select title,status from gallery where id=" . $row['id'] ;
                  }
                  $i = mysqli_query($conn, $sql);
                  $row_2 = mysqli_fetch_assoc($i);
                  echo "<tr><th scope=\"row\">" . $count . "</th>
                  <td>" . $row_2['title'] ."</td>";
                  echo "<td>" . $row['category'] ."</td>";
                  echo "<td>" . $row_2['status'] ."</td></tr>";
                  $count = $count + 1;
                }
              }
            ?>
            <!--    <tr>
                  <th scope="row">2</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Pending</td>
                </tr>
                <tr>
                  <th scope="row">7</th>
                  <td>Food</td>
                  <td>Gallery</td>
                  <td>Photo</td>
                  <td>Accepted</td>
                </tr> -->

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>



    <!--Footer section-->
    <hr class="mx-4">
    <footer>
      <div class="container-fluid text-center bg-white">
        <div class="row px-4">
          <div class="col-lg-7 mx-auto">
            <h2 class="text-dark my-4 bolded">ArticleHub.com</h2>
            <h6 class="text-dark my-4 letter-spacing-3" style="color: #9fa8a3;">showering you with media of creative minds.</h6>
            <p class="text-muted my-4">Have some questions about ArticleHub.com? Let's talk about how we can help you.</p>
            <ul class="list-inline my-4">
              <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-pinterest"></i></a></li>
              <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="copyrights bg-white px-4">
        <div class="container py-4 border-top text-center">
          <p class="mb-0 text-muted py-2">&copy; 2020 Copyright ArticleHub.com. All rights reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function login() {
        var win = window.open("login.html","_SELF");
      }
      function logout() {
        var win = window.open("logout.php","_SELF");
      }
    </script>
  </body>
</html>
<?php mysqli_close($conn) ?>  