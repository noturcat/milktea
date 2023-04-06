<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>About Us</title>
    <link rel = "icon" href ="pic/peteat.ico" type = "image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
</head>
<style type="text/css">

  
</style>
<body>

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_nav.php';?>
    <?php include 'partials/_feedbackModal.php'; ?>

      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/img/slide/slide-1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Peteat Milktea Station</span></h2>
                <p class="animate__animated animate__fadeInUp">Peteat Milktea Station offers freshly brewed tea mixed into a variety of tasty 
                <br> and refreshing concoctions that people will surely love. Our teas are brewed 
                <br> everyday to give you that fresh, flavorful and healthy tea drink. What makes our milk tea special is the smoothness 
                that you'll feel after sipping on your first cup.</p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/slide-2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <p class="animate__animated animate__fadeInUp">Find the right beverage and snack for you. You may check out our complete line of products here.</p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Menu</a>
              </div>
            </div>
          </div>
          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <p class="animate__animated animate__fadeInUp">Tastes good till the last drop.</p>
                <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>




  <section>
  <div class="row d-flex justify-content-center no-gutters">
    <div class="text-center">
      <!-- <div class="col-md-10 col-xl-8 text-center"> -->
      <div class="titles">
        <i><H1 class="p-2">
        TESTIMONIALS
        </H1></i>
        <?php
          $server = "localhost";
          $user = "root";
          $pass = "";
          $database = "tesmon";

          $conn = mysqli_connect($server, $user, $pass, $database);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          ?>
      </div>

      <div class="testimonial " style="overflow:hidden;;background-color: #FEF9C2 ; border-radius: 25px 25px 0 0;
          color:#502421;scrollbar-base-color:gold;font-family:sans-serif;">

          <div class=" d-flex justify-content-center no-gutters mt-3 scroll" >
            
          <?php

          $sql = "SELECT id, name, comment FROM tesmon";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              
              // output data of each row
              while($row = $result->fetch_assoc())
            {
              echo '<div class="col-3 d-flex justify-content-center mb-2 " >
                      <div class="card-body testi m-2 "style="height:250px; overflow:auto;">
                        <h5 class="card-title ">' . $row["name"]. '</h5>
                        <h6 class="card-subtitle mb-4 text-muted">name</h6>
                        <p class="card-text text-break"style="width: auto;">"'. $row["comment"]. '"</p>
                      </div>
                    </div>';
                   
              } 
              echo '</div>';
          } else {
              echo "0 results";
          }

          $conn->close();
          ?>



          <form>
          <br>
          <input type="button"  class="btn btn-secondary btn-rounded mt-2 mb-4" data-toggle="modal" data-target="#feedbackModal" value="GIVE US YOUR FEEDBACK" />
          </form>
      </div><div class="spacer layer1"></div>

    </div>

  </div>
 


  </section>
</body>
<div class="spacer layer2"></div>



  <!-- End Hero -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

