<style>

.modal-body .btn-success{
  background: #502421;
  color: #FEF9C2;
  font-weight: bold;
}

.modal-body .btn-success:hover{
  color: #FEF9C2;
  background: #502421;
  border: 1px solid #502421;
  font-weight: bold;
  text-shadow: #FC0 1px 0 10px;
}

.modal-body a{
  color: #000;
  font-weight: bold;
}

</style>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#FEF9C2; color:#502421;">
            <h5 class="modal-title" id="loginModal">Login Here</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleLogin.php" method="post">
              <div class="text-left my-2">
                  <b><label for="username">Username</label></b>
                  <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Password</label></b>
                  <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up now</a>.</p>
          </div>
        </div>
      </div>
    </div>

  