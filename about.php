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

    <title>About</title>
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
             <button class="btn btn-outline-dark" type="button" onclick="logout();">Log Out</button>
             <?php } 
             ?>
          </div>
        </div>
      </nav>
    </header>

        <!--Main Section-->
    <section class="bg-cover bg-center mt-5" id="main" style="background: linear-gradient(#000, transparent), url('img/about.jpg') no-repeat center; 
background-size: cover; height: 20%;">
      <div class="container py-4 index-forward">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="display-4 text-center my-5 bolded text-white">About</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Topics section-->
    <section class="container mt-5">
      <header>
        <h1 class="text-center text-dark bolded">Sarvajanik College of Engineering & Technology</h1>
        <hr class="my-4">
      </header>

      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <img class="my-3 shadow-sm" src="img/dome.jpg">
          </div>
          <div class="col-lg-12 my-3">
            <header>
              <p class="text-dark my-4" style="font-size: 18px;">Sarvajanik College of Engineering and Technology is one of the prime Institutions offering technical education in field of Engineering & MCA. Both the courses are affiliated with the Gujarat Technological University, Chandkheda approved by AICTE, New Delhi</br></br>SCET being one of the Institutes of the biggest Philanthropic Society of the Country has a strong base of values and commitments to create a progressive civilization. SCET located in the heart of the city presently enrolls more than 2000 students in various disciplines of Engineering and MCA where-in we run 9 UG courses and 7 PG courses. All UG and PG courses are affiliated to Gujarat Technological University (GTU), Chandkheda.</p>
            </header>
          </div>
        </div>
      </div>

    <!-- Topics section-->
    <section class="container mt-5">
      <header>
        <h1 class="text-center text-dark bolded">Events at SCET</h1>
        <hr class="my-4">
      </header>

      <!--Topic - 1 -->

      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-4">
            <img class="my-3" src="img/verve.jpg">
          </div>
          <div class="col-lg-8 my-3">
            <header>
              <h2 class="bolded" style="color: #343a40!important;">Verve</h2>
              <p class="text-dark my-4" style="font-size: 18px;">VERVE is our Cultural Fest organized since last 16 year to showcase the talent of our budding technocrats in the field of Music, Dance and Drama. Every year it is getting bigger & better due to constant dedication & inputs of staff and students body of Social & Cultural Committee under the banner of Student Activity Council. This year VERVE 2018 was organized during 5th-7th April, 2018 at amphitheatre of SCET.</p>
            </header>
          </div>
        </div>
      </div>

          <!--Topic - 2-->
     
      <div class="container-fluid my-4">
        <div class="row">
          <div class="col-lg-8 order-2 order-sm-12 my-3">
            <header>
              <h2 class="bolded" style="color: #343a40!important;">Kshitij</h2>
              <p class="text-dark my-4" style="font-size: 18px;">Within the boundries of SCET, lies an entirely different world-youth, overloaded with talent and infinite imagination awaiting an opportunity to showcase their ideas and creativity to the world. To provide these innovative minds with a platform and keep them as enthusiastic and motivated, the SCET organizes a National Level Tech-Fest-“KSHITIJ”. This has been transforming the society with breakthroughs in technological research and development since last 15 years.</p>
            </header>
          </div>
          <div class="col-lg-4 order-1 order-sm-12">
            <img class="my-3" src="img/ksitij.png">
          </div>
        </div>
      </div>


    <section class="container my-5">
      <header>
        <h1 class="text-center text-dark bolded">Locate Us</h1>
        <hr class="my-4">
      </header>
      <div class="map mt-5 mb-5">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.251987311791!2d72.80657111493515!3d21.182146485915517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e771bf220d9%3A0xbdd1676277c8bb1!2sSarvajanik%20College%20of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sin!4v1588947076578!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
