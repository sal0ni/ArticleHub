<?php session_start();
if(!isset($_SESSION['isLoggedin'])) {
  $_SESSION['isLoggedin']=false;   
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

    <title>Welcome to ArticleHub.com</title>
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
    <section class="main bg-cover bg-center mt-5" id="main" style="background: linear-gradient(#000, transparent), url('img/bb.jpg') no-repeat center; 
background-size: cover;">
      <div class="container py-4 index-forward">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="text-center mrb bolded" style="color: #f2f8fb;">Welcome <br> to <br> ArticleHub.com</h1>
            <h3 class="text-white mt-5 text-center">showering you with media of creative minds.</h3>
          </div>
         
        </div>
      </div>
    </section>

<!--
     Popular Stories section

    <section class="container mt-5">
      <header>
        <h1 class="text-center text-dark bolded">Popular Articles</h1>
        <p class="text-center text-dark my-4" style="font-size: 18px;">This week's most-read articles</p>
        <hr class="">
      </header>
      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-8">
            <img class="img-fluid my-3" src="img/bg.jpg">
          </div>
          <div class="col-lg-4 my-3">
            <header>
              <h2 class="text-dark bolded">Meet the Winners of FountainCloudpalooza</h2>
              <p class="text-dark my-4" style="font-size: 18px;">10 challenges, 10 prizes, and 10 talented winners. Here they are!</p>
            </header>
          </div>
        </div>
      </div>

      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-4 my-3 order-2 order-sm-12">
            <header>
              <h2 class="text-dark bolded">Photographer Adrien Olichon is Inspired by the Heart of Cities</h2>
              <p class="text-dark my-4" style="font-size: 18px;">Based in Lyon, France, he's perfectly located to travel to Europe's most beautiful urban centers.</p>
            </header>
          </div>
          <div class="col-lg-8 order-1 order-sm-12">
            <img class="img-fluid my-3" src="img/bg.jpg">
          </div>
        </div>
      </div>

      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-8">
            <img class="img-fluid my-3" src="img/bg.jpg">
          </div>
          <div class="col-lg-4 my-3">
            <header>
              <h2 class="text-dark bolded">FountainCloud Photo Upload Guidelines: How to Contribute</h2>
              <p class="text-dark my-4" style="font-size: 18px;">Everything you need to know about how to upload photos to FountainCloud.</p>
            </header>
          </div>
        </div>
      </div>

      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-4 my-3 order-2 order-sm-12">
            <header>
              <h2 class="text-dark bolded">Faces of Pretoria: The Photography of Johan de Jager</h2>
              <p class="text-dark my-4" style="font-size: 18px;"> Johan de Jager is the mastermind behind Hipkicks, an uber-cool sneaker emporium.</p>
            </header>
          </div>
          <div class="col-lg-8 order-1 order-sm-12">
            <img class="img-fluid my-3" src="img/bg.jpg">
          </div>
        </div>
      </div>
    </section>
-->
    


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
