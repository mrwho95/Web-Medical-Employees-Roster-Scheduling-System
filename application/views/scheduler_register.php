<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/photo/roster_icon.png"  type="image/ico">

    <title>Register an account</title>

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
      <div class="card card-register mx-auto" style="margin-top: 12%;">
        <div class="card-header">Register a Scheduler Account</div>
        <div class="card-body">
          <form action="<?php echo base_url()?>Registration/form_validation" method="post">
          <?php if($error = $this->session->flashdata('duplicate_user_msg')): ?>
          <div class="alert alert-danger alert-dismissible" role = "alert">
            <button type="button" class="close" data-dismiss= "alert" aria-label = "close"><span aria-hidden="true">&times;</span></button>
            <strong>Failed!</strong> <?= $error?>
          </div>
        <?php endif; ?>
          <?php if($error = $this->session->flashdata('success_msg')): ?>
          <div class="alert alert-success alert-dismissible" role = "alert">
            <button type="button" class="close" data-dismiss= "alert" aria-label = "close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> <?= $error?>
          </div>
        <?php endif; ?>
        <?php if($error = $this->session->flashdata('error_msg')): ?>
          <div class="alert alert-danger alert-dismissible" role = "alert">
            <button type="button" class="close" data-dismiss= "alert" aria-label = "close"><span aria-hidden="true">&times;</span></button>
            <strong>Failed!</strong> <?= $error?>
          </div>
          <?php endif; ?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="name" class="form-control" name="name" placeholder="Name">
                    <label for="name">Name:</label>
                    <span class="text-danger"><?php echo form_error("name")?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="schedulerID" class="form-control" name="schedulerID" placeholder="Scheduler ID">
                    <label for="schedulerID">Scheduler ID:</label>
                    <span class="text-danger"><?php echo form_error("schedulerID")?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                   <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="inputEmail" >
                    <label for="inputEmail">Email address:</label>
                    <span class="text-danger"><?php echo form_error("inputEmail")?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="tel" id="phonenumber" class="form-control" placeholder="Phone Number" name="phonenumber" >
                    <label for="phonenumber">(+60)Phone Number:</label>
                    <span class="text-danger"><?php echo form_error("phonenumber")?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword">
                    <label for="inputPassword">Password: *minimum 5 charaters</label>
                    <span class="text-danger"><?php echo form_error("inputPassword")?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="ConfirmPassword" class="form-control" name="confirm_password" placeholder="Confirm password">
                    <label for="ConfirmPassword">Confirm Password:</label>
                     <span class="text-danger"><?php echo form_error("confirmPassword")?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <select class="form-control" name="department" id="department">
                    <option selected disabled>Select Department:</option>
                    <option>Critical Care</option>
                    <option>Accident and Emergency</option>
                    <option>Anaesthetics</option>
                    <option>Cardiology</option>
                    <option>General Surgery</option>
                    <option>Nurition and Dietetics</option>
                    <option>Occupational therapy</option>
                    <option>Physiotherapy</option>
                    <option>Pharmacy</option>
                    <option>Urology</option>
                  </select>
                  <span class="text-danger"><?php echo form_error("department")?></span>  
                </div>
                <div class="col-md-6">
                   <select class="form-control" name="hospital" id="hospital">
                    <option selected disabled> Select Hospital</option>
                    <option>Pusat Rawatan Warga UMS</option>
                    <option>Queen Elizabeth Hospital I</option>
                    <option>Queen Elizabeth Hospital II</option>
                    <option>Rafflesia Medical Centre</option>
                    <option>Hospital Wanita Dan Kanak-Kanak Sabah</option>
                    <option>KPJ Damai Specialist Hospital</option>
                    <option>Gleneagles Kota Kinabalu</option>
                    <option>Jesselton Medical Centre Kota Kinabalu</option>
                  </select>
                  <span class="text-danger"><?php echo form_error("hospital")?></span>
                </div>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="insert" value="Register">
            <?php 
            if ($this->uri->segment(2) == "inserted") {
              echo '<p class="text-success">Data Inserted. Register successful</p>';
            }
            ?>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>login/index">Login Page</a>
            <a class="d-block small" href="<?php echo base_url(); ?>Forgot_Password/scheduler">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>

</html>
