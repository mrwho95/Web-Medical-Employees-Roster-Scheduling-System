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

    <link rel="icon" href="<?php echo base_url(); ?>assets/photo/roster_icon.png"  type="image/ico">

    <title>Timetable</title>

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

      <p style="color: white; margin-left: auto; text-align: center; font-size: 30px;" class="navbar-brand mr-1">Welcome <?php echo $this->session->userdata('schedulerID');?></p>

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
        <li class="nav-item active">
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

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>scheduler/index">Clinician TimeTable</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          
          <table class="table table-bordered table-striped table-hover" style="width: 90%; margin: auto;">
             <thead style="text-align: center; font-weight: bold;">
              <form method="post" action="<?php echo base_url()?>scheduler/generate_pdf">
              <input type="submit" name="generate_pdf" id="generate_pdf" style="width: auto; margin-right:55px; float: right;"class="btn btn-primary btn-block" value="Download Duty Roster PDF"><br><br>
            </form>
              <tr>
                <td colspan="12">MEDICAL EMPLOYEES ROSTER</td>
              </tr>
              <tr>
                <td colspan="12"><?php echo $firstdate." - ".$lastdate; ?></td>
              </tr>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>L / 20</th>
                <th>PH / 19</th>
                <th>MON</th>
                <th>TUE</th>
                <th>WED</th>
                <th>THU</th>
                <th>FRI</th>
                <th>SAT</th>
                <th>SUN</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="12">L = Annual Leave Remain</td>
              </tr>
              <tr>
                <td colspan="12">PH = Public Holiday Leave Remain</td>
              </tr>
              <tr>
                <td colspan="12">Morning Shift AM - 0700-1400 (Nurse) / 0700-1900 (Doctor)</td>
              </tr>
              <tr>
                <td colspan="12">Afternoon Shift PM - 1400-2100 (Nurse) / 0700-2200 (Doctor)</td>
              </tr>  
              <tr>
                <td colspan="12">Night Shift ND - 2100-0700 (Nurse)</td>
              </tr>
              <tr>
                <td colspan="12">On-Call OC - 0700-1200(Next Day) (Doctor)</td>
              </tr>
            </tfoot>
            <tbody style="text-align: center;">
              <?php 
                if ($total_duty_user > 0 ) {
                  foreach ($fetch_clinician_data as $key => $data) {
                    ?>
                    <tr>
                      <td><?php echo $fetch_clinician_data[$key]['Name'] ?></td>
                      <td><?php echo $fetch_clinician_data[$key]['Role'] ?></td>
                      <td><?php echo $fetch_clinician_data[$key]['L'] ?></td>
                      <td><?php echo $fetch_clinician_data[$key]['PH'] ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['MON'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['TUE'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['WED'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['THU'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['FRI'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['SAT'], 0,-11) ?></td>
                      <td><?php echo substr($fetch_clinician_data[$key]['SUN'], 0,-11) ?></td>
                    </tr>
                    <?php 
                  }
                }else{
                  ?>
                  <tr>
                    <td colspan="11">No Data Found</td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table><br>
          <p id="time" style="margin-left: 55px;"></p>
            <script>
            var d = new Date();
            document.getElementById("time").innerHTML = 'Updated at ' + d;
            </script>

          
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
    <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>scheduler/index">
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
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>
