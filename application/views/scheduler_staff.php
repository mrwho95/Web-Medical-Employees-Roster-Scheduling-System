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

  <title>Staff</title>

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
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>scheduling/jobplanning">
            <i class="fas fa-fw fa-table"></i>
            <span>Job Planning</span></a>
          </li>
          <li class="nav-item active">
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
                  <a href="<?php echo base_url(); ?>scheduler/staff">Staff</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
              </ol>

              <!-- DataTables Example -->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-user"></i>
                Clinician Table</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#clinicianAddModal" class="btn btn-info btn-xs">Add Clinician Account</button>
                    <br><br>
                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Clinician ID</th>
                          <th>Age</th>
                          <th>Phone Number</th>
                          <th>Home Address</th>
                          <th>Email</th>
                          <th>Position</th>
                          <th>Department</th>
                          <th>Hospital</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Clinician ID</th>
                          <th>Age</th>
                          <th>Phone Number</th>
                          <th>Home Address</th>
                          <th>Email</th>
                          <th>Position</th>
                          <th>Department</th>
                          <th>Hospital</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">       <p id="time"></p>
                  <script>
                    var d = new Date();
                    document.getElementById("time").innerHTML = 'Updated at ' + d;
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
        <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>scheduler/staff">
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

        <!--Edit clinician account-->
        <div id="clinicianModal" class="modal fade">  
          <div class="modal-dialog">  
            <form method="post" id="clinician_form"> 
              <div class="modal-content">  
                <div class="modal-header">
                  <h4 class="modal-title">Add Clinician Account</h4>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                  <label>Name</label>  
                  <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" />  
                  <br />
                  <label>Age</label>  
                  <input type="text" name="age" id="age" class="form-control" placeholder="Age" />  
                  <br />  
                  <label>Home Address</label>  
                  <input type="text" name="address" id="address" class="form-control" placeholder="Address" />  
                  <br />  
                  <label>(+60)Phone Number</label>  
                  <input type="tel" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phone Number" />  
                  <br />  
                  <label>Email Address</label>  
                  <input type="email" name="inputEmail" id="inputEmail" class="form-control" readonly="" placeholder="Email Address" />  
                  <br />
                  <label>Select Position:</label>
                  <select class="form-control" name="position" id="position">
                    <option>Nurse</option>
                    <option>Doctor</option>
                  </select>
                  <br />   
                  <label>Select Department:</label>
                  <select class="form-control" name="department" id="department">
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
                  <br />  
                  <label>Select Hospital:</label>
                  <select class="form-control" name="hospital" id="hospital">
                    <option>Pusat Rawatan Warga UMS</option>
                    <option>Queen Elizabeth Hospital I</option>
                    <option>Queen Elizabeth Hospital II</option>
                    <option>Rafflesia Medical Centre</option>
                    <option>Hospital Wanita Dan Kanak-Kanak Sabah</option>
                    <option>KPJ Damai Specialist Hospital</option>
                    <option>Gleneagles Kota Kinabalu</option>
                    <option>Jesselton Medical Centre Kota Kinabalu</option>
                  </select>   
                  <br />
                  <input type="text" name="staffID" id="staffID" class="form-control" placeholder="Staff ID" style="visibility: hidden;"  /> 
                  <input type="text" name="clinicianID" id="clinicianID" class="form-control" placeholder="Clinician ID" style="visibility: hidden;"  />         
                </div>
                <div class="modal-footer">  
                  <input type="submit" id="actionUpdate" name="action" class="btn btn-success" value="Update" />
                  <input type="hidden" name="user_id" id="user_id">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                </div>  
              </div>  
            </form>  
          </div>  
        </div>

        <!-- Add clinician model -->
        <div id="clinicianAddModal" class="modal fade">  
          <div class="modal-dialog">  
            <form method="post" id="clinician_addform"> 
              <div class="modal-content">  
                <div class="modal-header">
                  <h4 class="modal-title">Add Clinician Account</h4>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                  <label>Full Name</label>  
                  <input type="text" name="fullname" id="addfullname" class="form-control" placeholder="Full Name" />  
                  <br />
                  <label>Staff ID</label>  
                  <input type="text" name="staffID" id="addstaffID" class="form-control" placeholder="Staff ID"  /><br/>
                  <label>Password *minimum 6 charaters</label>  
                  <input type="password" name="inputpassword" id="addinputpassword" placeholder="Password" class="form-control" />  
                  <?php echo form_error("inputpassword")?></span>
                  <br />
                  <label>Age</label>  
                  <input type="text" name="age" id="addage" class="form-control" placeholder="Age" />  
                  <br />
                  <label>Home Address</label>  
                  <input type="text" name="address" id="addaddress" class="form-control" placeholder="Address" />  
                  <br />  
                  <label>(+60)Phone Number</label>  
                  <input type="tel" name="phonenumber" id="addphonenumber" class="form-control" placeholder="Phone Number" />  
                  <br />  
                  <label>Email Address</label>  
                  <input type="email" name="inputEmail" id="addinputEmail" class="form-control" placeholder="Email Address" />  
                  <br />
                  <label>Select Position:</label>
                  <select class="form-control" name="position" id="addposition">
                    <option>Nurse</option>
                    <option>Doctor</option>
                  </select>
                  <br />   
                  <label>Select Department:</label>
                  <select class="form-control" name="department" id="adddepartment">
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
                  <br />  
                  <label>Select Hospital:</label>
                  <select class="form-control" name="hospital" id="addhospital">
                    <option>Pusat Rawatan Warga UMS</option>
                    <option>Queen Elizabeth Hospital I</option>
                    <option>Queen Elizabeth Hospital II</option>
                    <option>Rafflesia Medical Centre</option>
                    <option>Hospital Wanita Dan Kanak-Kanak Sabah</option>
                    <option>KPJ Damai Specialist Hospital</option>
                    <option>Gleneagles Kota Kinabalu</option>
                    <option>Jesselton Medical Centre Kota Kinabalu</option>
                  </select>   
                  <br />
                </div>
                <div class="modal-footer">  
                  <input type="submit" id="actionAdd" name="action" class="btn btn-success" value="Add" />
                  <input type="hidden" name="user_id" id="user_id">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                </div>  
              </div>  
            </form>  
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

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

      </body>

      <script>  
       $(document).ready(function(){
         $('#add_button').click(function(){  
           $('#clinician_addform')[0].reset();  
           $('.modal-title').text("Add New Clinician Account");  
           $('#actionUpdate').hide(); 
           $('#actionAdd').show(); 

         })  

         var dataTable = $('#dataTable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
            url:"<?php echo base_url() . 'scheduler/fetch_clinician_data'; ?>",  
            type:"POST"  
          },  
          "columnDefs":[  
          {  
           "targets":[0, 3, 4],  
           "orderable":true,  
         },  
         ],  
       });

  //Edit clinician submission
  $(document).on('submit', '#clinician_form', function(event){  
   event.preventDefault(); 
   var Clinician_ID = $('#clinicianID').val();

   var Full_Name = $('#fullname').val();       
   var staff_ID = $('#staffID').val();
   var Password = $('#inputpassword').val();
   var Phone_Number = $('#phonenumber').val();
   var Email_Address = $('#inputEmail').val();
   var Department = $('#department').val();
   var Hospital = $('#hospital').val();
   var Age = $('#age').val();
   var Position = $('#position').val();
   var Address = $('#address').val();   

   if(Full_Name != '' && Phone_Number != '' && Department != '' && Hospital != '' && Position != '' && Age != '' && Address != '')
   {  
    $.ajax({  
     url:"<?php echo base_url() . 'admin2/update_clinician_action'?>",  
     method:'POST',  
     data:new FormData(this),  
     contentType:false,  
     processData:false,  
     success:function(data)  
     {  


      $('#clinician_form')[0].reset();  
      $('#clinicianModal').modal('hide');  
      dataTable.ajax.reload();  
    }  
  });  
  }  
  else  
  {  
    alert("Bother Fields are Required");  
  }  
});

    //Add clinician submission
    $(document).on('submit', '#clinician_addform', function(event){  
     event.preventDefault(); 
          // var Clinician_ID = $('#clinicianID').val();

          var Staff_ID = $('#addstaffID').val();
          var Full_Name = $('#addfullname').val();       
          var Password = $('#addinputpassword').val();
          var Phone_Number = $('#addphonenumber').val();
          var Email_Address = $('#addinputEmail').val();
          var Department = $('#adddepartment').val();
          var Hospital = $('#addhospital').val();
          var Age = $('#addage').val();
          var Position = $('#addposition').val();
          var Address = $('#addaddress').val();  

          console.log("Position: "+ Position); 
          
          if(Staff_ID != '' && Password != '' && Full_Name != '' && Phone_Number != '' && Department != '' && Hospital != '' && Position != '' && Age != '' && Address != '' && Email_Address != '')
          {  
            $.ajax({  
             url:"<?php echo base_url().'admin2/add_clinician_action'?>",  
             method:'POST',  
             data:new FormData(this),  
             contentType:false,  
             processData:false,  
             success:function(data)  
             {  


              $('#clinician_addform')[0].reset();  
              $('#clinicianAddModal').modal('hide');  
              dataTable.ajax.reload();  
            }  
          });  
          }  
          else  
          {  
            alert("Bother Fields are Required");  
          }  
        });

    //edit clinician
    $(document).on('click', '.update', function(){  
     var user_id = $(this).attr("id"); 
     $('#actionAdd').hide();  
     $('#actionUpdate').show(); 
     console.log("user_id"+user_id); 
     $.ajax({  
      url:"<?php echo base_url(); ?>admin2/fetch_single_clinician",  
      method:"POST",  
      data:{user_id:user_id},  
      dataType:"json",  
      success:function(data)  
      {  
        console.log(data);
        $('#clinicianModal').modal('show');  
        $('#fullname').val(data['userFullName']);  
        $('#inputEmail').val(data['userEmail']);
        $('#clinicianID').val(data['userId']);
        $('#staffID').val(data['userStaffID']);
        $('#password').val(data['userPassword']);
        $('#age').val(data['userAge']);  
        $('#position').val(data['userPosition']);
        $('#address').val(data['userHomeAddress']); 
        $('#phonenumber').val(data['userHandphone']);
        $('#department').val(data['userDepartment']);  
        $('#hospital').val(data['userHospital']);  
        $('.modal-title').text("Edit Clinician Account");  
        $('#user_id').val(user_id);    

      }  
    })  
   });


  //delete clinician
  $(document).on('click', '.delete', function(){  
   var user_id = $(this).attr("id");  
   if(confirm("Are you sure you want to delete this?"))  
   {  
    $.ajax({  
     url:"<?php echo base_url(); ?>admin2/delete_single_clinician",  
     method:"POST",  
     data:{user_id:user_id},  
     success:function(data)  
     {  
      alert(data);  
      dataTable.ajax.reload();  
    }  
  });  
  }  
  else  
  {  
    return false;       
  }  
});   
});  


</script>
</html>
