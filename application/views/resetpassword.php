<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>

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
            <input type="submit" class="btn btn-primary btn-block" value="Update Password">
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
