<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

echo '<nav class="navbar navbar-expand-lg " >
      <a class="navbar-brand" href="index.php"><img src="pic/peteat_longs.png" height="75px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Top Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            $sql = "SELECT categorieName, categorieId FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<a class="dropdown-item" href="viewmilkteaList.php?catid=' .$row['categorieId']. '">' .$row['categorieName']. '</a>';
            }
            echo '</div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewOrder.php">Your Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          
        </ul>
        <form method="get" action="/peteat/search.php" class="form-inline my-2 my-lg-0 mx-3">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>';

        $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }
        echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
          <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>  
          <i class="bi bi-cart">Cart(' .$count. ')</i>
        </button></a>';

        if($loggedin){
          echo '<ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="partials/_logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small position-relative">
            <a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.png\'" style="width:40px; height:40px"></a>
          </div>';
        }
        else {
          echo '
          <button type="button" class="btn mx-2 nav-button"  data-toggle="modal" data-target="#loginModal">Login</button>
          <button type="button" class="btn mx-2 nav-button"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
        }
            
  echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>

<style>


body {
  font-family: 'Montserrat', sans-serif;
  background: #f7f8fa;
  
}

.wrapper {
  padding: 30px 0;
  position: relative;
  margin: 12px 0;
}

.footer{
  width: 1600px;
  margin-left: -40%;
  margin-right: -40%;
  margin-bottom: -20%;
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: white;
}

.btn {
  color: #502421;
  border: 1px solid #502421;
}

/* search */
.navbar .btn-outline-success{
  color: #502421;
  background: #FEF9C2;
  font-weight: bold;
  border: 1px solid #502421;
}

/* cart */
.btn-secondary {
    color: #FEF9C2;
    background: #502421;
    font-weight: bold;
    border: 1px solid #502421;
}
.navbar .btn-secondary:hover{
  color: #FEF9C2;
  background: #502421;
  border: 1px solid #502421;
  font-weight: bold;
  text-shadow: #FC0 1px 0 10px;
}

/* login-signup button */

.navbar .nav-button{
  color: #502421;
  background: #FEF9C2;
  font-weight: bold;
  border: 1px solid #502421;
}

.btn:hover {
  color: #FEF9C2;
  background: #502421;
  border: 1px solid #502421;
  font-weight: bold;
  text-shadow: #FC0 1px 0 10px;
}

.navbar{
  position: sticky;
  background: #FEF9C2;
    top: 0;
    left: 0;
    z-index: 111;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
}

.navbar-expand-lg {
  background: #fef9c2;
}
.nav-link{
  color: #502421;
  
}
.nav-link:hover{
  text-shadow: #FC0 1px 0 10px;
  color: #502421;
}
.color{
  color: #502421;
}
.color:hover{
  color: #FEF9C2;
  text-shadow: #FC0 1px 0 10px;
  color: #FEF9C2;
}
h2{
  color: #502421;
}
button{
  background: #FEF9C2;
}

.alert-link{
  cursor: pointer;
}

.alert-warning{
  background: #502421;
  color: #fff;
}

.card-title a{
  color: #502421;
}
.m-1 {
  /* [1.1] Set it as per your need */
  overflow: hidden; /* [1.2] Hide the overflowing of child elements */
}

/* [2] Transition property for smooth transformation of images */
.m-1 img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.m-1:hover img {
  transform: scale(1.1);
}
.col-lg-3.col-md-4{
  overflow: hidden;
  border-radius: 50% 15%;
}

.card-body{
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;
  background: #fef9c2;
  text-align: center;

  }
  .spacer {
        aspect-ratio: 960/100;
        width: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }
      .layer1 {
        background-image: url('pic/yellowwhite.svg');
      }
      .layer2 {
        background-image: url('pic/whitebrown.svg');
      }
.card-body.testi{
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;
  background: #f7f8fa;
  text-align: center;
  width: 364px;

  }
  .scroll{
    overflow-x: auto;
    overflow-y: hidden;
  }

.titles {
  font-size: 20px;
  color: #262626;
  font-weight: 3S00;
  background-color: #fef9c2;
  border-radius: 25px;
 
}
/* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: #502421 #FEF9C2;
  }

  /* Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 16px;
  }

  *::-webkit-scrollbar-track {
    background: #FEF9C2;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #502421;
    border-radius: 10px;
    border: 3px solid #FEF9C2;
  }
.testi{
  border: 1px solid #502421;
  border-radius: 25px;
}
</style>