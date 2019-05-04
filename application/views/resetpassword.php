<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/photo/roster_icon.png"  type="image/ico">

    <title>Reset Password</title>

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
        <div class="card-header">Change Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Key in New Password</h4>
          </div>
          <form  method="post" action="<?php echo base_url()?>Forgot_Password/updatepassword">
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputnewPassword" name="inputnewPassword" class="form-control" placeholder="Enter New Password" required="required" autofocus="autofocus">
                <label for="inputnewPassword">Enter New Password</label>
              </div><br>
              <div class="form-label-group">
                <input type="password" id="inputcPassword" name="inputcPassword" class="form-control" placeholder="Confirm New Password" required="required" autofocus="autofocus">
                <label for="inputcPassword">Confirm New Password</label>
              </div>
            </div>

            <?php if($error = $this->session->flashdata('success_msg_update_scheduler_password')): ?>
              <div class="alert alert-success alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

            <input type="submit" class="btn btn-primary btn-block" value="Reset Password">
          </form>
          <?php 
           $this->session->flashdata('message');
          ?>
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
