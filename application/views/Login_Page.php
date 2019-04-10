<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a href="<?php echo base_url(); ?>login/index">
      <img src="<?php echo base_url(); ?>assets/photo/roster_icon.png" width="50px" height="50px"></a>
      <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>login/index">Medical Employees Scheduling</a>
    </nav>

    <div id="wrapper">
      <ul class="sidebar navbar-nav">
    </ul>
      <div id="content-wrapper">
        <div class="container-fluid container">
           <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>scheduler/login">Login Account</a>
            </li>
          </ol>
          <div class="row">
            <div class="col-xl-4 col-sm-6">
              <img src="<?php echo base_url(); ?>assets/photo/admin.png" width="80%" height="80%">
              <button onclick="document.getElementById('adminlogin').style.display='block'" class="btn btn-primary" style="width:auto; margin-left: 18%;">Administrator Login
              </button>
            </div>
            <div class="col-xl-4 col-sm-6">
              <img src="<?php echo base_url(); ?>assets/photo/admin.png" width="80%" height="80%">
              <button onclick="document.getElementById('schedulerlogin').style.display='block'" class="btn btn-primary" style="width:auto; margin-left: 22%;">Scheduler Login
              </button>

            </div>

       <footer class="sticky-footer" style="margin: auto; position: fixed;">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Medical Employees Scheduling 2019</span>
            </div>
          </div>
        </footer>

        <!--Admin Login form 1-->
            <div id="adminlogin" class="card card-login mx-auto mt-5" style="display: none; z-index: 1; position: fixed; left: 40%; top: 13%; width: 100%;">
              <div class="card-header">Administator Login
                <span onclick="document.getElementById('adminlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url()?>login/admin_form_validation">
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
                      <label>
                        <input type="checkbox" value="remember-me">Remember Password
                      </label>
                    </div>
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LeGaJcUAAAAAHp9kPQXTgK4AmJfd3RKERsLIShY">
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
            <div id="schedulerlogin" class="card card-login mx-auto mt-5" style="display: none; z-index: 1; position: fixed; left: 40%; top: 13%; width: 100%;">
              <div class="card-header">Scheduler Login
                <span onclick="document.getElementById('schedulerlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>login/scheduler_form_validation">
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
                      <label>
                        <input type="checkbox" value="remember-me">Remember Password
                      </label>
                    </div>
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LeGaJcUAAAAAHp9kPQXTgK4AmJfd3RKERsLIShY">
                  </div><br>
                  <input class="btn btn-primary btn-block" name="insert" value="Login" type="submit">
                  <?php echo $this->session->flashdata("error");?>
                </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="<?php echo base_url(); ?>Registration/scheduler_register_index">Register an Account</a>
                  <a class="d-block small" href="<?php echo base_url(); ?>Forgot_Password/scheduler">Forgot Password?</a>
                </div>
              </div>
            </div>
          <!-- /.Scheduler Login form 2 -->
       <!-- Sticky Footer -->

        <!-- /.container-fluid -->
      </div>
      <!-- /.content-wrapper -->

    </div>

 </div>

    <!-- /#wrapper -->
</div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>assets/#page-top">
      <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  </body>

</html>
