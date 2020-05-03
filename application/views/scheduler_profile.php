<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="refresh" content="900;url= sessionexpired" />
  <link rel="icon" href="<?php echo base_url(); ?>assets/photo/roster_icon.png"  type="image/ico">

  <title>Scheduler Profile</title>

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
  
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a href="<?php echo base_url(); ?>scheduler/index">
      <img src="<?php echo base_url(); ?>assets/photo/roster_icon.png" width="50px" height="50px"></a>
      <a class="navbar-brand mr-1" style ="margin-left: 10px;" href="<?php echo base_url(); ?>scheduler/index">Scheduler-Medical Employees Scheduling</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>assets/#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>assets/#">Action</a>

          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>assets/#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>scheduler/department_work_policy">Work Policy Settings</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>admin/admin_details">Profile Settings </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>scheduler/index">
            <i class="fas fa-fw fa-table"></i>
            <span>Timetable</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>scheduler/calendar">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Calender</span>
          </a>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>scheduling/jobplanning">
              <i class="fas fa-fw fa-table"></i>
              <span>Job Planning</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>scheduler/staff">
                <i class="fas fa-fw fa-users"></i>
                <span>Staff</span></a>
              </li>
            </ul>

            <div id="content-wrapper">

              <div class="container-fluid container">


                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>admin/index">Scheduler Profile</a>
                  </li>
                  <li class="breadcrumb-item active">Overview</li>
                </ol>

                
                <div class="card mx-5 mt-5">
                  <div class="card-header">
                    <i class="fa fa-user">Scheduler Account Details</i>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">Name:  
                          <?php 
                              echo $fetch_data['Name'];
                          ?>
                        </div>
                        <div class="col-md-6">Scheduler ID: 
                          <?php
                            echo $fetch_data['SchedulerID'];
                          ?>     
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        Password: 
                          <?php
                            echo $fetch_data['Password'];
                          ?>     
                      </div>
                      <div class="col-md-6">
                       Gender: 
                          <?php
                            echo $fetch_data['Gender'];
                          ?>     
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      Email: 
                          <?php
                            echo $fetch_data['Email'];
                          ?>     
                    </div>
                    <div class="col-md-6">
                     Phone Number: 
                          <?php
                            echo $fetch_data['Phone_Number'];
                          ?>     
                  </div>

                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    Department: 
                          <?php
                            echo $fetch_data['Department'];
                          ?>     
                  </div>
                  <div class="col-md-6">
                   Hospital: 
                          <?php
                            echo $fetch_data['Hospital'];
                          ?>     
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- update profile-->
        <div id="update" class="card card-register mx-auto mt-5">
          <div class="card-header">Update Scheduler Profile</div>
          <div class="card-body">
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
            <form action="<?php echo base_url()?>scheduler/update_scheduler_form_validation" method="post">
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
                      <label for="inputPassword">Password:</label>
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
                  <div class="col-md-12">
                    
                   <select class="form-control" name="gender" id="gender">
                    <option selected disabled>Select Gender:</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                  <span class="text-danger"><?php echo form_error("gender")?></span>
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
            <input class="btn btn-primary btn-block" type="submit" name="update" value="Update">
            <?php 
            if ($this->uri->segment(2) == "inserted") {
              echo '<p class="text-success">Data Inserted. Register successful</p>';
            }
            ?>
          </form>
        </div>
      </div>
      <br><br>

      <!-- update profile-->
      
      <!-- /.container-fluid -->
      <!--Refresh Time-->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Medical Employees Scheduling 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>scheduler/scheduler_details">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url(); ?>scheduler/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.dataTables.min.js"></script>



  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>




</body>

</html>