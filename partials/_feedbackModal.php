<style type="text/css">
    .modal-body{
        background: #f7f8fa;
    }
    .modal-header{
        border-bottom: none;
    }
</style>
<!-- Login Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header " style="background-color:#FEF9C2; color:#502421;">
            <h5 class="modal-title" id="feedbackModal">Give us your Feedback  &#128512;</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="spacer layer1"></div>
          <div class="modal-body">
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
                 

                <p style="color:black;font-size:15px;">Name</p> 

                  
                  <input class="form-control" type="text" name="name" value="<?php echo $name;?>">
                  <span class="error"> <?php echo $nameErr;?></span>
                 <br>
                 
                <center>
                 <p style="color:black;font-size:15px;">Comment</p> 

                  <textarea  class="form-control" name="comment" rows="4" cols="30"><?php echo $comment;?> </textarea>
                  <br><br>
                  
                  
                <form>
                <button type="submit" name="submit" class="btn btn-warning btn-rounded" value="submit"> SUBMIT</button>
                </form>
            </div>
            <?php
            $server = "localhost";
            $user = "root";
            $pass = "";
            $database = "tesmon";

            $conn = mysqli_connect($server, $user, $pass, $database);

            ?>

          </div>
          <div class="spacer layer2"></div>
        </div>

      </div>
    </div>

<style>

.btn-success {
    background: #502421;
}

</style>


