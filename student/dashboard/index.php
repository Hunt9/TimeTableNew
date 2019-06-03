<?php 
session_start();
include('config.php');

if($_SESSION['stu_id']=="" && $_SESSION['name']=="")
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
        <div class="sidebar-brand-text mx-3">Student Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

    
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
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
        <div class="container-fluid"  id="print">

          <!-- Page Heading -->
		   <?php
   $con=mysqli_connect('localhost','root','','timetable');


$query = "Select uname from university order by uid DESC limit 1"; 

$result = mysqli_query($con,$query);
  while($row = mysqli_fetch_array($result)) {

    ?>
          <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $row['uname']; }?></h1>
         <!--  <h1 class="h3 mb-2 text-gray-800">Time Tables</h1> -->
          <p class="mb-4">Below are the Schedules for Subjects, Teachers, Events and Rooms.

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Time Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                       <th>Normal Timing</th>


<?php


$connection=mysqli_connect('localhost','root','','timetable');


function getData()
{
    
$connection=mysqli_connect('localhost','root','','timetable');

$query = "SELECT normal_time FROM timeslot"; 

$result = mysqli_query($connection,$query);

 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo "
    <th>". $row["normal_time"]. "</th>
   ";
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($connection);
}

    getData();


 
mysqli_close($connection);

 
?>

</tr>



                 
                  </thead>



                               <thead>
                    <tr>

                       <th>Friday Timing</th>


<?php


$connection=mysqli_connect('localhost','root','','timetable');


function getData1()
{
    
$connection=mysqli_connect('localhost','root','','timetable');

$query = "SELECT friday_time FROM timeslot"; 

$result = mysqli_query($connection,$query);

 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo "
    <th>". $row["friday_time"]. "</th>
   ";
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($connection);
}

    getData1();


 
mysqli_close($connection);

 
?>

</tr>

      
                  </thead>
              



                  <tbody>
                    <tr>
                      <td><h4>Monday</h4></td>
                       <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM();


 
mysqli_close($con);

 
?>    </td>
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM1()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM1();


 
mysqli_close($con);

 
?>    </td>
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM2();


 
mysqli_close($con);

 
?>    </td>                   
    
    
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM3();


 
mysqli_close($con);

 
?>    </td>    
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM4();


 
mysqli_close($con);

 
?>    </td>    
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM5();


 
mysqli_close($con);

 
?>    </td>    				
 
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM6();


 
mysqli_close($con);

 
?>    </td>
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM7();


 
mysqli_close($con);

 
?>    </td>
 <td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM8();


 
mysqli_close($con);

 
?>    </td>		
<td>   <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataM9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=1 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataM9();


 
mysqli_close($con);

 
?>    </td>		
		
			</tr>

                  </tbody>

                      <tr>
                      <td><h4>Tuesday</h4></td>
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT();


 
mysqli_close($con);

 
?>    </td>
     
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT2();


 
mysqli_close($con);

 
?>    </td>
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT3();


 
mysqli_close($con);

 
?>    </td>
 </td>
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT4();


 
mysqli_close($con);

 
?>    </td>
 </td>
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT5();


 
mysqli_close($con);

 
?>    </td>
 </td>
                <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT6();


 
mysqli_close($con);

 
?>    </td>
  <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT7();


 
mysqli_close($con);

 
?>    </td>
  <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT8();


 
mysqli_close($con);

 
?>    </td>
  <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT9();


 
mysqli_close($con);

 
?>    </td>
  <td>         <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataT10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=2 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataT10();


 
mysqli_close($con);

 
?>    </td>
 

                    </tr>

                  

                      <tr>
                      <td><h4>Wednesday</h4></td>
                    <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW();


 
mysqli_close($con);

 
?>    </td>
   <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW2();


 
mysqli_close($con);

 
?>    </td>
   <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW3();


 
mysqli_close($con);

 
?>    </td>  
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW4();


 
mysqli_close($con);

 
?>    </td>  
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW5();


 
mysqli_close($con);

 
?>    </td>    
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW6();


 
mysqli_close($con);

 
?>    </td>   
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW7();


 
mysqli_close($con);

 
?>    </td> 
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW8();


 
mysqli_close($con);

 
?>    </td>    
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW9();


 
mysqli_close($con);

 
?>    </td> 
<td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataW10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=3 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataW10();


 
mysqli_close($con);

 
?>    </td>              
				 </tr>

                      <tr>
                      <td><h4>Thursday</h4></td>
           
                  
  <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH1()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH1();


 
mysqli_close($con);

 
?></td>     
      <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH2();


 
mysqli_close($con);

 
?></td>    
      <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH3();


 
mysqli_close($con);

 
?></td>    
      <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH4();


 
mysqli_close($con);

 
?></td>  
 
   <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH5();


 
mysqli_close($con);

 
?></td>
   <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH6();


 
mysqli_close($con);

 
?></td>  
 
 <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH7();


 
mysqli_close($con);

 
?></td>  
 <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH8();


 
mysqli_close($con);

 
?></td>  
 <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH9();


 
mysqli_close($con);

 
?></td>  
 <td>    <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataTH10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=4 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataTH10();


 
mysqli_close($con);

 
?></td> 
				  </tr>

                      <tr>
                      <td><h4>Friday</h4></td>
                   <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF2();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF3();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF4();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF5();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF6();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF7();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF8();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF9();


 
mysqli_close($con);

 
?>    
</td>
  <td>     <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataF10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=5 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataF10();


 
mysqli_close($con);

 
?>    
</td>
                    </tr>

                      <tr>
                      <td><h4>Saturday</h4></td>
              <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa();


 
mysqli_close($con);

 
?>    </td>

      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa2();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa3();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa4();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa5();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa6();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa7();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa8();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa9();


 
mysqli_close($con);

 
?>    </td>
      <td>       <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataSa10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=6 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataSa10();


 
mysqli_close($con);

 
?>    </td>
                    </tr>

                      <tr>
                      <td><h4>Sunday</h4></td>
                  <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=1 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS2()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=2 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS2();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS3()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=3 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS3();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS4()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=4 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS4();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS5()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=5 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS5();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS6()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=6 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS6();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS7()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=7 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS7();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS8()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=8 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS8();


 
mysqli_close($con);

 
?>   </td> 
 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS9()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=9 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS9();


 
mysqli_close($con);

 
?>   </td> 

 <td>      <?php
					$con=mysqli_connect('localhost','root','','timetable');

function getDataS10()
{
    
$con=mysqli_connect('localhost','root','','timetable');

$id = $_SESSION['sem_id'];

$query = "Select subject.subject_name,room.name as r,building.name as b,semester.semester_name,timeschedule.time_id as tid, teacher.name from timeschedule inner join subject on subject.subject_id=timeschedule.subject_id inner join room on timeschedule.room_id=room.id inner join building on room.building_id=building.id INNER join semester on subject.sem_id=semester.sem_id INNER join teacher on timeschedule.teacher_id=teacher.teacher_id where subject.sem_id=$id  and timeschedule.day=7 and timeschedule.time_id=10 order by timeschedule.time_id asc"; 

$result = mysqli_query($con,$query);
$countM=0;
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results


//$rpid = $row["rp_id"];
//$pid = $row["p_id"];

    echo $row["subject_name"]."\n". $row["r"]. ":". $row["b"] ."\n" . $row["name"];
 //$row['index'] the index here is a field name
}

 //Close the table in HTML


mysqli_close($con);
}

    getDataS10();


 
mysqli_close($con);

 
?>   </td> 


                    </tr>
                   

                  </tbody>
                </table>
              </div>
			  	<script>
				var divName="print";
				function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>
          <button class="btn btn-secondary" type="button" id='print_button' data-dismiss="modal" onclick="printDiv('print')">Print Time Table</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Insert New Time Table</h5>
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
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
               
      
          
              </form>

          
            </div>
       


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Reset</button>
          <a class="btn btn-primary" href="login.html">Insert</a>
        </div>
      </div>
    </div>
  </div>
    </div>








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
