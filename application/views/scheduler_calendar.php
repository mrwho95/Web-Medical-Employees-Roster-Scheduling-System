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

    <title>Calendar</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->


    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!--Calendar css -->
    <link href='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />

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
          <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <li class="nav-item dropdown active">
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

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>scheduler/calendar">Calender</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

      <!--Calendar-->
      <div class="row">
        <div class="col-xl-8 col-sm-8">
          <div id="calendar" style="margin: auto; max-width: 100%; height: 100%;">
            <br>
            <p id="time"></p>
            <script>
            var d = new Date();
            document.getElementById("time").innerHTML = 'Updated at ' + d;
            </script>
          </div>
        </div>
        <div class="col-xl-4 col-sm-4">
           <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <td colspan="2" style="text-align: center; font-weight: bold;">Public Holidays</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1-Jan-2019</td>
                <td>New Year Day</td>
              </tr>
              <tr>
                <td>21-Jan-2019</td>
                <td>Thaipusam</td>
              </tr>
              <tr>
                <td>5-Feb-2019</td>
                <td>Chinese New Year</td>
              </tr>
              <tr>
                <td>6-Feb-2019</td>
                <td>Chinese New Year</td>
              </tr>
               <tr>
                <td>1-May-2019</td>
                <td>Labour Day</td>
              </tr>
              <tr>
                <td>21-May-2019</td>
                <td>Nuzul Quran</td>
              </tr>
              <tr>
                <td>5-Jun-2019</td>
                <td>Hari Raya Puasa</td>
              </tr>
              <tr>
                <td>6-Jun-2019</td>
                <td>Hari Raya Puasa</td>
              </tr>
               <tr>
                <td>12-Aug-2019</td>
                <td>Hari Raya Haji</td>
              </tr>
              <tr>
                <td>31-Aug-2019</td>
                <td>National Day</td>
              </tr>
              <tr>
                <td>1-Sep-2019</td>
                <td>Awal Muharam</td>
              </tr>
              <tr>
                <td>9-Sep-2019</td>
                <td>Agong's Birthday</td>
              </tr>
               <tr>
                <td>16-Sep-2019</td>
                <td>Malaysia Day</td>
              </tr>
              <tr>
                <td>27-Oct-2019</td>
                <td>Deevapali</td>
              </tr>
              <tr>
                <td>10-Nov-2019</td>
                <td>Prophet Muhammad's Birthday</td>
              </tr>
              <tr>
                <td>11-Dec-2019</td>
                <td>Sultan of Selangor's Birthday</td>
              </tr>
               <tr>
                <td>25-Dec-2019</td>
                <td>Christmas Day</td>
              </tr>
            </tbody>
          </table>
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
    <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>scheduler/calendar">
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


    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/lib/moment.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/lib/jquery.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/fullcalendar.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.10.0/locale-all.js'></script>


    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>
    <script defer src="./init-firebase.js"></script>


  </body>

<script>

  //configure Firebase
  var Config = {
    apiKey: "AIzaSyDKNgmT9Bly0cXZGIYqyTxq8lEFBIy402Y",
    authDomain: "medical-77850.firebaseapp.com",
    databaseURL: "https://medical-77850.firebaseio.com/",
    projectId: "medical-77850",
    storageBucket: "medical-77850.appspot.com",
  };
 firebase.initializeApp(Config);

 // var database = firebase.database();
 // var dutyroster = firebase.database().ref("official_duty_roster");


 // var config = {
 //    apiKey: "AIzaSyBWdb3LNY2Ji9S165NUoQ9JIZjGxzlTmnY",
 //    authDomain: "smart-kadus.firebaseapp.com",
 //    databaseURL: "https://smart-kadus.firebaseio.com",
 //    projectId: "smart-kadus",
 //    storageBucket: "smart-kadus.appspot.com",
 //    messagingSenderId: "731787069959"
 //  };

 //  firebase.initializeApp(config);
 //  var ref =  firebase.database().ref('online_class_test_result/'+{{ $class_object->id }}+'/'+{{ $test_obj->id }}+'/student');
 //END configure Firebase

 //load all the data

//Load the
  $(document).ready(function() {
    console.log('<?php echo base_url(); ?>calendar/getcalendarevents');
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      weekNumbers: true,
      weekNumbersWithinDays:false,
      editable: true,
      // eventColor:'#ff0000',
      eventLimit: true, // allow "more" link when too many events
      // events: '<?php echo base_url(); ?>scheduler/getcalendarevents',
      eventSources: [ 
        {
          url: '<?php echo base_url(); ?>calendar/getcalendarevents',
          color: 'yellow',
          textColor: 'black',
        },

      ],
     
      // events: [
      //   {
      //     title: 'All Day Event',
      //     start: '2019-05-01',
      //     color: 'blue',
      //   },
      //   {
      //     title: 'Long Event',
      //     start: '2019-05-07',
      //     end: '2019-05-10'
      //   },
      //   {
      //     title: 'Click for Google',
      //     url: 'http://google.com/',
      //     start: '2019-05-28'
      //   }
      // ],  
       
    });

  });

</script>

</html>


