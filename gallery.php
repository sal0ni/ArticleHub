<?php session_start();
$_SESSION['isLoggedin'];   
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

    <title>Gallery</title>
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
              <?php if($_SESSION['isLoggedin']==true) { ?> 
              <li class="nav-item"><a class="nav-link text-dark" href="status.php">Status</a></li>
              <?php } ?>
            </ul>
             &nbsp;
             <?php if($_SESSION['isLoggedin']==false) { ?> 
             <button class="btn btn-outline-dark" type="button" onclick="login();">Login</button>
            <?php } 
            else { ?>
             <button class="btn btn-outline-dark" type="button" data-toggle="modal" data-target="#GalleryModal">Upload</button>&nbsp;
              <button class="btn btn-outline-dark" type="button" onclick="logout();">Log Out</button>

              <?php }
             ?>
          </div>
        </div>
      </nav>
    </header>

    <!--Main Section-->
    <section class="bg-cover bg-center mt-5" id="main" style="background: linear-gradient(#000, transparent), url('img/gallery.jpg') no-repeat center; 
background-size: cover; height: 20%;">
      <div class="container py-4 index-forward">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-4 text-center my-5 bolded text-white">Gallery</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Popular Stories section-->

    <section class="container-fluid mt-5">
      <header>
        <h1 class="text-center text-dark bolded"></h1>
        <p class="text-center text-dark my-4" style="font-size: 18px;"></p>
        
      </header>
      <div class="container-fluid my-4">
        <div class="row">
        <?php
              $servername = "localhost:3308";
              $username = "root";
              $password = "";
              $dbname = "magazine";
              $conn =  mysqli_connect($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
              
              $sql = "Select id,title,caption,url from gallery where status=2";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)) {
              ?>
            <div class="col-lg-3 col-md-6 col-sm-12 my-3">
            <div class="card" style="width: auto;
    height: 385px;
	">
              <img class="card-img-top" style="max-width: 100%;
    height: 180px" data-toggle="modal" data-target="#modal<?php $row['id'];?>" src="images/<?php echo $row['url'] ?>" alt="Card image cap">
              <div class="card-body">
              <header>
                <h4 class="bolded"><?php echo $row['title'] ?></h4>
              </header>
                <p class="card-text"><?php echo $row['caption'] ?></p>
                <p class="float-right font-italic">
                  <?php $sql = "SELECT firstName, lastName,branch,year from student where enrollmentNo=(SELECT enrollmentNo FROM submission WHERE id=" . $row['id'] . " and category='" . "gallery')";
                      $student = mysqli_query($conn, $sql);
                      $row_s = mysqli_fetch_assoc($student);?></p>
                
                  <p class="font-italic" style="position:absolute; bottom:0;">-
                  <?php echo $row_s['firstName'] . " " . $row_s['lastName']?></p>
                
              </div>
            </div>
            </div>
            
            
            <!-- Card Modal -->
          <!--  <div class="modal fade" id="modal<?php $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="one" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="card"><?php echo $row['url'] ?>
                            <img class="card-img-top" src="images/<?php echo $row['url'] ?>" alt="Card image cap">
                            <div class="card-body">
                            <header>
                              <h3 class="bolded"><?php echo $row['title'] ?></h3>
                            </header>
                              <p class="card-text"><?php echo $row['caption'] ?></p>
                              <p class="float-right font-italic">- <?php echo $row_s['firstName'] ?></p>
                            </div>
                          </div>
                </div>
              </div> -->
            <?php } ?>
          
         

          

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


    <!-- Modal -->
<div class="modal fade" id="GalleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="custom-file">
              <input type="hidden" name="size" value="1000000">
                <input type="file" name="image" class="custom-file-input">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" maxlength="21" required> 
          </div>
          <div class="form-group">
            <input type="text" name="caption" class="form-control" placeholder="Caption" maxlength="96" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-dark" name="upload_image" id="upload_image" value="Upload">
      </div>
      </form>
    </div>
  </div>
</div>


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