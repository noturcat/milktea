
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Feedback page</title>
  <link rel = "icon" href ="pic/peteat.ico" type = "image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>



<body>

<?php
// define variables and set to empty values
$nameErr =  "";
$name = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  

  
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<form action="connectdb.php" method="POST">

<form method="post" action="<?php echo 
htmlspecialchars($_SERVER["PHP_SELF"]);?>">   

<div class="form1"> 
  


<center>
 <H3>Give us your Feedback  &#128512; </H3> 

<p style="color:black;font-size:15px;">Name</p> 

  
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
 <br>
 
<center>
 <p style="color:black;font-size:15px;">Comment</p> 

  <textarea name="comment" rows="4" cols="30"><?php echo $comment;?> </textarea>
  <br><br>
  
  
<form>
<button type="submit" name="submit" class="btn btn-warning btn-rounded" value="submit"> SUBMIT</button>



</form>
</div>



</body>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "tesmon";

$conn = mysqli_connect($server, $user, $pass, $database);

?>





<style>


.error {color: #FF0000;}

.form1 {
	width: 80%;
	font-size: 30px;
	margin-left: 10%;
	  margin-top:3%;
  margin-bottom: 20%;
	color: #262626;
	background-color: #EDEC8E;
	border-radius: 30px;
	box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
 
}

body {
	font-family: 'Montserrat', sans-serif;
	background: #fef9c2;
}



</style>