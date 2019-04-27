<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/loginpage.css" rel="stylesheet">

  </head>

  <body>
    <div class="split left" style="width: 100%;">
        <h1 style="top: 50px;">The Scheduler</h1>
    </div>
    <div class="container">
      <div class="card card-login mx-auto" style="margin-top: 15%;">
        <div class="card-header">Scheduler Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <?php if($error = $this->session->flashdata('Invalid Message')): ?>
              <div class="alert alert-danger alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                <span aria-hidden="true">&times;</span>
                </button>
              <strong>Failed!</strong><?= $error?>
              </div><br>
            <?php endif; ?>
            <?php if($error = $this->session->flashdata('Success Message')): ?>
              <div class="alert alert-success alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                <span aria-hidden="true">&times;</span>
                </button>
              <strong>Failed!</strong><?= $error?>
              </div><br>
            <?php endif; ?>
            <h4>Forgot your password?</h4>
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
          </div>
          <form  method="post" action="<?php echo base_url()?>Forgot_Password/reset_link">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter email address</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Send Reset Link">
          </form>
          
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>Registration/admin_register_index">Register an Administrator Account</a>
            <a class="d-block small" href="<?php echo base_url(); ?>Registration/scheduler_register_index">Register a Scheduler Account</a>
            <a class="d-block small" href="<?php echo base_url(); ?>login/index">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
