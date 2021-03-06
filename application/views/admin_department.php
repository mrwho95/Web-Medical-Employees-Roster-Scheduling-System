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

  <title>Department</title>

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
      <a class="navbar-brand mr-1" style ="margin-left: 10px;" href="<?php echo base_url(); ?>admin/index">Admin-Medical Employees Scheduling</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="<?php echo base_url(); ?>assets/#">
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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/clinician">
          <i class="fas fa-fw fa-user"></i>
          <span>Clinician</span>
        </a>

      </li>

      <li class="nav-item active">
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
                <a href="<?php echo base_url(); ?>admin/department">Department</a>
              </li>
              <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-building"></i>
              Department Table</div>
              <div class="card-body">
                <div class="table-responsive">
                  <button type="button" id="add_button" data-toggle="modal" data-target="#departmentModal" class="btn btn-info btn-xs">Add New Department</button>
                  <br><br>
                  <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Department Name</th>
                        <th>Department Unit</th>
                        <th>Department Manager Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Department Name</th>
                        <th>Department Unit</th>
                        <th>Department Manager Name</th>
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
      <a class="scroll-to-top rounded" href="<?php echo base_url(); ?>admin/department">
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
              <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!--Add department-->
      <div id="departmentModal" class="modal fade">  
        <div class="modal-dialog">  
          <form method="post" id="department_form"> 
            <div class="modal-content">  
              <div class="modal-header">
                <h4 class="modal-title">Add New Department</h4>  
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">  
                <label>Selcet Department:</label>  
                <select class="form-control" name="dname" id="dname">
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
                <label>Unit</label>  
                <input type="text" name="unit" id="unit" class="form-control" placeholder="Department Unit" />  
                <br />
                <label>Manager Name</label>  
                <input type="text" name="manager_name" id="manager_name" class="form-control" placeholder="Manager Name" />  
                <br />  
              </div>  
              <div class="modal-footer">  
                <input type="submit" id="action" name="action" class="btn btn-success" value="Add" />
                <input type="hidden" name="user_id" id="user_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>  
            </div>  
          </form>  
        </div>  
      </div>

      <!--Edit department-->
      <div id="departmentEditModal" class="modal fade">  
        <div class="modal-dialog">  
          <form method="post" id="department_Editform"> 
            <div class="modal-content">  
              <div class="modal-header">
                <h4 class="modal-title">Add New Department</h4>  
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">  
                <label>Select Department:</label>  
                <select class="form-control" name="dname" id="Editdname">
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
                <br/>    
                <label>Unit</label>  
                <input type="text" name="unit" id="Editunit" class="form-control" placeholder="Department Unit" />  
                <br />
                <label>Manager Name</label>  
                <input type="text" name="manager_name" id="Editmanager_name" class="form-control" placeholder="Manager Name" />  
                <br />  
              </div>  
              <div class="modal-footer">  
                <input type="submit" id="action" name="action" class="btn btn-success" value="Update" />
                <input type="hidden" name="user_id" id="Edituser_id">
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
  //datatable  
  $(document).ready(function(){  
    $('#add_button').click(function(){  
     $('#department_form')[0].reset();  
     $('.modal-title').text("Add New Department Account");  
     $('#action').val("Add");   
   }) 
    var dataTable = $('#dataTable').DataTable({  
     "processing":true,  
     "serverSide":true,  
     "order":[],  
     "ajax":{  
      url:"<?php echo base_url() . 'admin/fetch_department_data'; ?>",  
      type:"POST"  
    },  
    "columnDefs":[  
    {  
     "targets":[0, 1, 2],  
     "orderable":true, 
   },  
   ],  
 });  

  //Add department Submission
  $(document).on('submit', '#department_form', function(event){  
   event.preventDefault();  
   var DName = $('#dname').val();  
   var Unit = $('#unit').val();  
   var Manager_Name = $('#manager_name').val();

   if(DName != '' && Unit != '' && Manager_Name != '')
   {  
    $.ajax({  
     url:"<?php echo base_url() . 'admin2/add_department_action'?>",  
     method:'POST',  
     data:new FormData(this),  
     contentType:false,  
     processData:false,  
     success:function(data)  
     {  
      alert(data);  
      $('#department_form')[0].reset();  
      $('#departmentModal').modal('hide');  
      dataTable.ajax.reload();  
    }  
  });  
  }  
  else  
  {  
    alert("Bother Fields are Required");  
  }  
}); 


   //edit department
   $(document).on('click', '.update', function(){  
     var user_id = $(this).attr("ID");  
     $.ajax({  
      url:"<?php echo base_url(); ?>admin2/fetch_single_department",  
      method:"POST",  
      data:{user_id:user_id},  
      dataType:"json",  
      success:function(data)  
      {  
       $('#departmentEditModal').modal('show');  
       $('#Editdname').val(data.dname);  
       $('#Editunit').val(data.unit);
       $('#Editmanager_name').val(data.manager_name);   
       $('.modal-title').text("Edit Department Account");  
       $('#Edituser_id').val(user_id);    
       $('#action').val("Update");  
     }  
   })  
   });

   //Edit department Submission
   $(document).on('submit', '#department_Editform', function(event){  
     event.preventDefault();  
     var DName = $('#Editdname').val();  
     var Unit = $('#Editunit').val();  
     var Manager_Name = $('#Editmanager_name').val();

     if(DName != '' && Unit != '' && Manager_Name != '')
     {  
      $.ajax({  
       url:"<?php echo base_url() . 'admin2/update_department_action'?>",  
       method:'POST',  
       data:new FormData(this),  
       contentType:false,  
       processData:false,  
       success:function(data)  
       {  
        alert(data);  
        $('#department_Editform')[0].reset();  
        $('#departmentEditModal').modal('hide');  
        dataTable.ajax.reload();  
      }  
    });  
    }  
    else  
    {  
      alert("Bother Fields are Required");  
    }  
  }); 

  //delete department
  $(document).on('click', '.delete', function(){  
   var user_id = $(this).attr("ID");  
   if(confirm("Are you sure you want to delete this?"))  
   {  
    $.ajax({  
     url:"<?php echo base_url(); ?>admin2/delete_single_department",  
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
