<?php 
  $firstdate = date("d/m/Y", strtotime("Next Monday"));
  $lastdate = date("d/m/Y", strtotime("Next Monday + 6 days"));
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="900;url= sessionexpired" />

    <title>Job Planning</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


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
            <a class="dropdown-item" href="<?php echo base_url(); ?>scheduler/scheduler_details">Profile Settings</a>
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
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?php echo base_url(); ?>scheduler/calendar">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Calender</span>
          </a>
        </li>
        <li class="nav-item active">
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

        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>scheduler/jobplanning">Job Planning</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <?php if($error = $this->session->flashdata('success_msg_next_person')): ?>
              <div class="alert alert-success alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

            <?php if($error = $this->session->flashdata('success_msg_update_roster')): ?>
              <div class="alert alert-info alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

             <?php if($error = $this->session->flashdata('success_msg_delete_last_row')): ?>
              <div class="alert alert-warning alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

          <!-- <div class="card mx-5">
            <div class="card-header">
              <i class="fa fa-user">Clinician info</i>
            </div>
          <div class="card-body">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">Name: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Name;
                      } 
                  ?>               
                </div>
                <div class="col-md-6">
                  Clinician ID: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->ClinicianID;
                      } 
                  ?>        
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  Email: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Email;
                      } 
                  ?>   
                </div>
                <div class="col-md-6">
                 Gender: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Gender;
                      } 
                  ?>       
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  Department: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Department;
                      } 
                  ?>       
                </div>
                <div class="col-md-6">
                 Phone Number: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Phone_Number;
                      } 
                  ?>    
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                 Hospital: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Hospital;
                      } 
                  ?>        
                </div>
                <div class="col-md-6">
                 Leave: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Medical_Leave;
                      } 
                  ?>        
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  Shift Preference for this week: <?php foreach($fetch_clinician_data->result() as $row){
                    echo $row->Shift_Preference;
                      } 
                  ?>   
                </div>
              </div>
            </div>
            <form method="post" action="<?php echo base_url()?>scheduling/next_person">
              <input type="submit" id="next" name="next" class="btn btn-success" value="Next Person" style="float: right;" />
            </form>
            <form method="post" action="<?php echo base_url()?>scheduling/update_duty_table">
              <input type="submit" id="update_duty_roster" name="update_duty_roster" class="btn btn-info" value="Update Duty Roster" style="float: right; margin-right: 10px" />
            </form>
            
        </div>
      </div><br><br> -->

        <table class="table table-bordered table-striped table-hover" style="width: 90%; margin: auto;">
            <?php if($error = $this->session->flashdata('success_msg_generate_roster')): ?>
              <div class="alert alert-info alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

            <?php if($error = $this->session->flashdata('success_msg_clear_content')): ?>
              <div class="alert alert-danger alert-dismissible"   style="width: 90%; margin: auto;" role = "alert">
                <button type="button" class="close" data-dismiss= "alert"  aria-label = "close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <strong>Success!</strong> <?= $error?>
              </div><br>
            <?php endif; ?>

            <thead>
              <tr>
                <td colspan="9" style="text-align: center; font-weight: bold;">
                  MEDICAL EMPLOYEE JOB SCHEDULING (DUTY ROSTER)
                </td>
              </tr>
              <tr>
                <td colspan="9" style="text-align: center; font-weight: bold;">
                  <?php echo $firstdate." - ".$lastdate; ?>
                </td>
              </tr>
              <tr style="text-align: center;">
                <th>Name</th>
                <th>Role</th>
                <th>MON</th>
                <th>TUE</th>
                <th>WED</th>
                <th>THU</th>
                <th>FRI</th>
                <th>SAT</th>
                <th>SUN</th>
              </tr>
            </thead>
            <tbody style="text-align: center;">
              <?php 
                if ($fetch_clinician_data->num_rows() > 0 ) {
                  foreach ($fetch_clinician_data->result() as $row) {
                    ?>
                    <tr>
<!--                       <td><?php echo $row->ID; ?></td> -->
                      <td><?php echo $row->Name; ?></td>
                      <td><?php echo $row->Position; ?></td>
                      <td><?php echo $row->MON; ?></td>
                      <td><?php echo $row->TUE; ?></td>
                      <td><?php echo $row->WED; ?></td>
                      <td><?php echo $row->THU; ?></td>
                      <td><?php echo $row->FRI; ?></td>
                      <td><?php echo $row->SAT; ?></td>
                      <td><?php echo $row->SUN; ?></td>
                    </tr>
                    <?php 
                  }
                }else{
                  ?>
                  <tr>
                    <td colspan="9" style="text-align: center;">No Data Found</td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table><br>
          
          <div style="max-width: 95%;">
            <form method="post" action="<?php echo base_url()?>scheduling/clear_duty_roster">
            <input type="submit" id="Clear_Duty_Roster" name="Clear_Duty_Roster" class="btn btn-danger" value="Clear Duty Roster" style="float: right;" />
            </form>
            <form method="post" action="<?php echo base_url()?>scheduling/redo">
              <input type="submit" id="Redo" name="Redo" class="btn btn-warning" value="Redo" style="float: right; margin-right: 10px;" />
            </form>
            <form method="post" action="<?php echo base_url()?>scheduling/generate_duty_roster">
             <input type="submit" id="Generate_Duty_Roster" name="Generate_Duty_Roster" class="btn btn-primary" value="Generate Duty Roster" style="float: right; margin-right: 10px;" />
            </form>
          </div>
          
            <br><br><br>
       <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
              Clinician Table</div>
              <div class="card-body">
                <!-- <form method="post" action="<?php echo base_url();?>scheduling/update_duty_table">
            <input type="submit" name="update_table" id="update_table" value="Update Duty Table" action="update_dt" class="btn btn-info btn-block" style="width: auto;"><br> -->
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="clinician_table" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th>Name</th>
                      <th>Clinician ID</th>
<!--                       <th>Gender</th>
                      <th>Age</th> -->
                      <th>Phone Number</th>
                      <!-- <th>Address</th> -->
                      <th>Email</th>
                      <th>Position</th>
                      <th>Department</th>
                      <th>Hospital</th>
                      <th>Update Duty Roster</th>
<!--                       <th>Delete</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Clinician ID</th>
<!--                       <th>Gender</th>
                      <th>Age</th> -->
                      <th>Phone Number</th>
                      <!-- <th>Address</th> -->
                      <th>Email</th>
                      <th>Position</th>
                      <th>Department</th>
                      <th>Hospital</th>
                      <th>Update Duty Roster</th>
<!--                       <th>Delete</th> -->
                    </tr>
                  </tfoot>
                </table>
              </div>  
             </form>
            </div>
            <div class="card-footer small text-muted">
              <p id="time2"></p>
                <script>
                var d = new Date();
                document.getElementById("time2").innerHTML = 'Updated at ' + d;
                </script>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

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
    <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>scheduling/jobplanning">
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

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </body>

<script>  
 $(document).ready(function(){
      var dataTable = $('#clinician_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url().'scheduling/fetch_clinician_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":true,  
                },  
           ],  
      });

      //edit clinician
    $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("ID");

           $.ajax({  
                url:"<?php echo base_url(); ?>scheduling/update_duty_table",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json"  
                // success:function()  
                //      {  
                //           // alert(data);  
                //           dataTable.ajax.reload();  
                //      }  
           })
          if(!alert('Duty Roster Updated Successful!'))
            {window.location.reload();}
      });


    });
    </script>

</html>
