<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url(); ?>assets/photo/roster_icon.png"  type="image/ico">

  <title>Login Page</title>

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/css/loginpage.css" rel="stylesheet">

</head>


  <div class="container1">
    <div class="split left">
      <h1>The Scheduler</h1>
      <button onclick="document.getElementById('schedulerlogin').style.display='block'" class="btn btn-danger" style="width: 300px;">Medical Scheduler Login
      </button>
    </div>
    <div class="split right">
      <h1>The Administrator</h1>
      <button onclick="document.getElementById('adminlogin').style.display='block'" class="btn btn-success" style="width: 300px;">Medical Administrator Login
      </button>
    </div>

    <!--Admin Login form 1-->
    <div id="adminlogin" class="card card-login mx-auto mt-5" style="display: none; z-index: 1; position: fixed; left: 35%; width: 100%;">
      <div class="card-header">Medical Administator Login
        <span onclick="document.getElementById('adminlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url()?>login/admin_form_validation">
          <div class="form-group">
            <div class="form-label-group" ">
              <img src="<?php echo base_url(); ?>assets/photo/roster_icon.png" width="100px" height="100px" style="margin-left: 125px;"><br>
              <p style="text-align: center; font-weight: bold;">Medical Employees Scheduling</p>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="adminID" class="form-control" name="adminID" placeholder="Admin ID:" >
              <label for="adminID">Admin ID:</label>
              <span class="text-danger"><?php echo form_error('adminID')?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="admininputPassword" name="admininputPassword" class="form-control" placeholder="Password:">
              <label for="admininputPassword">Password:</label>
              <span class="text-danger"><?php echo form_error('admininputPassword')?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <input type="checkbox" name="remember-me">Remember Me
            </div>
          </div>
          <div class="g-recaptcha" style="margin-left: 30px;" data-sitekey="6LeGaJcUAAAAAHp9kPQXTgK4AmJfd3RKERsLIShY">
          </div><br>
          <input class="btn btn-primary btn-block" name="insert" value="Login" type="submit">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url(); ?>Registration/admin_register_index">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url(); ?>Forgot_Password/admin">Forgot Password?</a>
        </div>
      </div>
    </div>
    <!-- /. Admin Login form 1 -->

    <!--Scheduler Login form -->
    <div id="schedulerlogin" class="card card-login mx-auto mt-5" style="display: none; z-index: 1; position: fixed; left: 35%; width: 100%;">
      <div class="card-header">Medical Scheduler Login
        <span onclick="document.getElementById('schedulerlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>login/scheduler_form_validation">
          <div class="form-group">
            <div class="form-label-group" ">
              <img src="<?php echo base_url(); ?>assets/photo/roster_icon.png" width="100px" height="100px" style="margin-left: 125px;"><br>
              <p style="text-align: center; font-weight: bold;">Medical Employees Scheduling</p>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="schedulerID" name="schedulerID" class="form-control" placeholder="Scheduler ID:" >
              <label for="schedulerID">Scheduler ID:</label>
              <span class="text-danger"><?php echo form_error('schedulerID')?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password:" name="inputPassword">
              <label for="inputPassword">Password:</label>
              <span class="text-danger"><?php echo form_error('inputPassword')?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
             <input type="checkbox" name="remember-me">Remember Me
           </div>
         </div>
         <div class="g-recaptcha" style="margin-left: 30px;" data-sitekey="6LeGaJcUAAAAAHp9kPQXTgK4AmJfd3RKERsLIShY">
         </div><br>
         <input class="btn btn-primary btn-block" name="insert" id="insert" value="Login" type="submit">
         <?php echo $this->session->flashdata("error");?>
       </form>
       <div class="text-center">
        <a class="d-block small mt-3" href="<?php echo base_url(); ?>Registration/scheduler_register_index">Register an Account</a>
        <a class="d-block small" href="<?php echo base_url(); ?>Forgot_Password/scheduler">Forgot Password?</a>
      </div>
    </div>
  </div>
  <!-- /.Scheduler Login form 2 -->


  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  </body>

  <script>
    const left = document.querySelector(".left");
    const right = document.querySelector(".right");
    const container1 = document.querySelector(".container1");

    left.addEventListener("mouseenter", () => {
      container1.classList.add("hover-left");
    });

    left.addEventListener("mouseleave", () => {
      container1.classList.remove("hover-left");
    });

    right.addEventListener("mouseenter", () => {
      container1.classList.add("hover-right");
    });

    right.addEventListener("mouseleave", () => {
      container1.classList.remove("hover-right");
    });

  </script>

  </html>
