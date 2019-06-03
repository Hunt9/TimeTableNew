<?php 
session_start();
include('config.php');
$id = $_SESSION['teacher_id'];

if($_SESSION['teacher_id']=="" && $_SESSION['name']=="")
{
  echo "<script type = 'text/javascript'>window.location.href = '../index.php'; </script> ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Time Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Time Table</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


     
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="event.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="meeting.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Meeting</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
           

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'];?></span>
                <img class="img-profile rounded-circle" src="img/admin.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->   <?php
   $con=mysqli_connect('localhost','root','','timetable');


$query = "Select uname from university order by uid DESC limit 1"; 

$result = mysqli_query($con,$query);
  while($row = mysqli_fetch_array($result)) {

    ?>
          <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $row['uname']; }?></h1>
		  
         <!--  <h1 class="h3 mb-2 text-gray-800">Events</h1> -->
          <p class="mb-4">Below are the Meetings.

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Meetings</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Start at</th>
                      <th>End at</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Start at</th>
                      <th>End at</th>
                    </tr>
                  </tfoot>

 <tbody>
                    



<?php


$connection=mysqli_connect('localhost','root','','timetable');


function getData()
{
    
$connection=mysqli_connect('localhost','root','','timetable');

$query = "SELECT id,name,description,date,start_time,end_time FROM meeting"; 

$result = mysqli_query($connection,$query);

 // start a table tag in the HTML

// <a name='clear'  id= 'clear'  value = $event_id
//     data-target='#insertModal'>Update</a>

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


   $event_id = $row["id"];

    echo "<tr>
    <td>". $row["id"]. "</td>
    <td>". $row["name"]. " </td>
    <td>" . $row["description"] . "</td>
    <td>" . $row["date"] . "</td>
    <td>" . $row["start_time"] . "</td>
    <td>" . $row["end_time"] . "</td>



    </tr>";

    // <td>"."  <a href='#' data-toggle='modal' data-target='#updateEvent'>
    //               Update
    //             </a>

    //             "."</td>
   
    // </tr>";
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($connection);
}

    getData();


 
mysqli_close($connection);

 
?>










                 

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 <!-- Insertion Modal-->
  <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Insert New Event</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="container">

    <div class="container">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
   
                <h1 class="h4 text-gray-900 mb-4"> </h1>
              </div>
              <form class="user" method="POST" action="insert.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="ename" name="ename" placeholder="Event Name">
                  </div>
              
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="ediscrip" name = "ediscrip" placeholder="Event Description">
                </div>

                <div class="form-group">
                 Date: <input type="date" class="form-control form-control-user" id="edate" name = "edate">
                </div>

                 <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    Start Time: <input type="time"  class="form-control form-control-user" id="estime" name="estime">
                  </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                    End Time: <input type="time" class="form-control form-control-user" id="eetime" name="eetime">
                  </div>
              
                </div>

      
              
          
            </div>
       


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" name="insertmeeting" id = "insertmeeting">Insert</button>
        </div>
      </div>
    </div>
  </div>
    </div>

</form>



 <!-- Insertion Modal-->
  <div class="modal fade" id="updateEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Event</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="container">

    <div class="container">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
   
                <h1 class="h4 text-gray-900 mb-4"> </h1>
              </div>
              <form class="user" method="POST" action="update.php">
                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="evid" name="evid" placeholder="Event id">
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="uename" name="uename" placeholder="Event Name">
                  </div>
              
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="uediscrip" name = "uediscrip" placeholder="Event Description">
                </div>

                <div class="form-group">
                 Date: <input type="date" class="form-control form-control-user" id="uedate" name = "uedate">
                </div>

                 <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    Start Time: <input type="time"  class="form-control form-control-user" id="uestime" name="uestime">
                  </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                    End Time: <input type="time" class="form-control form-control-user" id="ueetime" name="ueetime">
                  </div>
              
                </div>

      
              
          
            </div>
       


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" name="updatemeeting" id = "updatemeeting">Update</button>
        </div>
      </div>
    </div>
  </div>
    </div>

</form>







      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; FYP</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
