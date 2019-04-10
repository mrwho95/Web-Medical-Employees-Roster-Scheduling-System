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

  </head>

  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Special Access Scheduler Part Request</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Verification Code</h4>
            <p>Scheduler will send a verification code to administrator. Key-in 6 digit number code.</p>
          </div>
          <form  method="post" action="<?php echo base_url()?>Forgot_Password/reset_password">
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" id="specialcode" class="form-control" placeholder="Enter Verification Code" required="required" autofocus="autofocus">
                <label for="number">Enter Verification Code</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block" href="<?php echo base_url(); ?>Forgot_Password/index">Access</a>
          </form>
          <?php 
            echo validation_errors('<p class="error">');
            if (isset($error))
            {
              echo '<p class="error">'.$error.'</p>';
            }
          ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>admin/index">Administrator Homepage</a>
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
