<?php
    $conn=mysqli_connect('localhost','root','','timetable');

    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);

//====================== Update TimeTable ==============================

if(isset($_POST['clear'])){
    
    $val = $_POST['clear'];
    
    $allowed = mysqli_query($conn,"DELETE FROM timeschedule  WHERE timeschedule_id = $val");
    
    if(!$allowed)
    {
        echo "<script type='text/javascript'>alert('Deletion Failed! (Server Error)')</script>";
        echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";
    }else{
        echo "<script type='text/javascript'>alert('Record Deleted Successfully!')</script>";
        echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";
    }
    
}



mysqli_close($conn);
  ?>