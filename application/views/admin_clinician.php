<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

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
      <a href="<?php echo base_url(); ?>admin/index">
      <img src="<?php echo base_url(); ?>assets/photo/roster_icon.png" width="50px" height="50px"></a>
      <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>admin/index">Admin-Medical Employees Scheduling</a>

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
             <a class="dropdown-item" href="<?php echo base_url(); ?>admin/admin_details">Profile Settings</a>
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
          <a class="nav-link" href="<?php echo base_url(); ?>admin/index">
            <i class="fas fa-fw fa-user"></i>
            <span>Scheduler</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>admin/clinician">
            <i class="fas fa-fw fa-user"></i>
            <span>Clinician</span>
          </a>

        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>admin/department">
            <i class="fas fa-fw fa-building"></i>
            <span>Department</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>admin/hospital">
            <i class="fas fa-fw fa-hospital"></i>
            <span>Hospital</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>admin/clinician">Clinician</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
              Clinician Table
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <button type="button" data-toggle="modal" id="add_button" data-target="#clinicianModal" class="btn btn-info btn-xs">Add New Clinician</button>
                <br><br>
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
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
                      <th>Gender</th>
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
    <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>admin/clinician">
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
            <a class="btn btn-primary" href="<?php echo base_url(); ?>login/index">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!--Add clinician account-->
    <div id="clinicianModal" class="modal fade">  
      <div class="modal-dialog">  
        <form method="post" id="clinician_form"> 
          <div class="modal-content">  
            <div class="modal-header">
              <h4 class="modal-title">Add New Clinician</h4>  
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
            </div>  
            <div class="modal-body">  
              <label>Full Name</label>  
              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" />  
              <br />
              <label>Age</label>  
              <input type="text" name="age" id="age" class="form-control" placeholder="Age" />  
              <br />  
              <label>Gender</label>  
              <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" />  
              <br />
              <label>Clinician ID</label>  
              <input type="text" name="clinicianID" id="clinicianID" class="form-control" placeholder="Clinician ID" />  
              <br />  
              <label>Password</label>  
              <input type="password" name="inputpassword" id="inputpassword" placeholder="Password" class="form-control" />  
              <br />
              <label>Address</label>  
              <input type="text" name="address" id="address" class="form-control" placeholder="Address" />  
              <br />  
              <label>(+60)Phone Number</label>  
              <input type="tel" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phone Number" />  
              <br />  
              <label>Email Address</label>  
              <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email Address" />  
              <br />
              <label>Position</label>  
              <input type="text" name="position" id="position" placeholder="Position" class="form-control" />  
              <br />   
              <label>Department</label>  
              <input type="text" name="department" id="department" placeholder="Department" class="form-control" />  
              <br />  
              <label>Hospital</label>  
              <input type="text" name="hospital" id="hospital" class="form-control" placeholder="Hospital" />  
              <br />           
            </div>
            <div class="modal-footer">  
              <input type="submit" id="action" name="action" class="btn btn-success" value="Add" />
              <input type="hidden" name="action" class="btn btn-success" value="Add" />
              <input type="submit" id="action" name="action" class="btn btn-success" value="Update" />
              <input type="hidden" name="action" class="btn btn-success" value="Update" />
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
s

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </body>

  <script>  
    //datatables
 $(document).ready(function(){
  $('#add_button').click(function(){  
           $('#clinician_form')[0].reset();  
           $('.modal-title').text("Add New Clinician Account");  
           $('#action').val("Add");   
      })   
      var dataTable = $('#dataTable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_clinician_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 1, 4],  
                     "orderable":true,  
                },  
           ],  
      });  

    //Add clinician
    $(document).on('submit', '#clinician_form', function(event){  
           event.preventDefault();  
           var Full_Name = $('#fullname').val();  
           var Gender = $('#gender').val();  
           var Clinician_ID = $('#clinicianID').val();
           var Password = $('#inputpassword').val();
           var Phone_Number = $('#phonenumber').val();
           var Email_Address = $('#inputEmail').val();
           var Department = $('#department').val();
           var Hospital = $('#hospital').val();
           var Age = $('#age').val();
           var Position = $('#position').val();
           var Address = $('#address').val();   

           if(Full_Name != '' && Gender != '' && Clinician_ID != '' && Password != '' && Phone_Number != '' && Email_Address != '' && Department != '' && Hospital != '' && Position != '' && Age != '' && Address != '')
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'admin2/add_clinician_action'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data);  
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

    //edit clinician
    $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("ID");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin2/fetch_single_clinician",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#clinicianModal').modal('show');  
                     $('#fullname').val(data.fullname);  
                     $('#inputEmail').val(data.inputEmail);
                     $('#clinicianID').val(data.clinicianID);  
                     $('#password').val(data.password);
                     $('#gender').val(data.gender);
                     $('#age').val(data.age);  
                     $('#position').val(data.position);
                     $('#address').val(data.address); 
                     $('#phonenumber').val(data.phonenumber);
                     $('#department').val(data.department);  
                     $('#hospital').val(data.hospital);  
                     $('.modal-title').text("Edit Clinician Account");  
                     $('#user_id').val(user_id);    
                     $('#action').val("Update");  
                }  
           })  
      });

      //delete clinician
    $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("ID");  
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
