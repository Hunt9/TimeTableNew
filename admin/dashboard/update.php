<?php
    $conn=mysqli_connect('localhost','root','','timetable');

    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);

//====================== Update Events ==============================

  	if(isset($_POST['updateevent'])) {
    $id = $_POST["evid"];
	$name=$_POST["uename"];
    $discrip=$_POST["uediscrip"];
    $date=$_POST["uedate"];
    $starttime=$_POST["uestime"];
    $endtime=$_POST["ueetime"];

    $sql = "UPDATE event set  name = '$name', description = '$discrip',date = '$date',start_time = '$starttime',end_time = '$endtime'  WHERE id = $id" ;

   if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'event.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'event.php'; </script> ";
}

}

//====================== Update Rooms ==============================

    if(isset($_POST['updateroom'])) {

        $roomid=$_POST["roomid"];
        $br=$_POST["ubr"];
        $room=$_POST["uroom"];
        $seat=$_POST["useat"];


        $sql = "UPDATE room set  name = '$room', seats = $seat, building_id = $br WHERE id = $roomid" ;

        // $sql = "INSERT INTO room (name,seats,building_id)
        // VALUES ('".$room."','".$seat."','".$br."')";


        if (mysqli_query($conn, $sql)) {
     
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
} else {
      echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
}


    }


//====================== Update Buildings ==============================

  if(isset($_POST['updateBuilding'])) {

    $buildingid =$_POST["buildingid"];  
    $building =$_POST["ubuilding"];

    // $sql = "INSERT INTO building (name)
    //     VALUES ('".$building."')";

    $sql = "UPDATE building set name = '$building' WHERE id = $buildingid";


    if (mysqli_query($conn, $sql)) {
     
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
}
}


//====================== Update Teachers ==============================

 if(isset($_POST['updateTeacher'])) {
    $tid=$_POST["tid"];
    $nme=$_POST["unme"];
    $eml=$_POST["ueml"];
    $cnt=$_POST["ucontact"];
    $pass=$_POST["upass"];
        $rpass=$_POST["urpass"];
        $add=$_POST["uadd"];
                $did=$_POST["udep"];
                if($pass==$rpass)
                {

    // $sql = "INSERT INTO teacher (name,eid,password,mob,address,department_id)
    //     VALUES ('".$nme."','".$eml."','".$cnt."','".$pass."','".$add."','".$did."')";

    $sql = "UPDATE teacher set name = '$nme', eid = '$eml',password = '$pass',mob = '$cnt',address = '$add',department_id = $did WHERE teacher_id = $tid";



   if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
    // echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
}

                }
                else
                {
                   echo "<script type='text/javascript'>alert('Password Not Matched!')</script>";
                  // echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
                }

  }



//====================== Update Subject ==============================

   if(isset($_POST['updateSub'])) {
    $sid=$_POST["sid"];
    $did=$_POST["udep"];
    $semid=$_POST["usem"];
    $sub=$_POST["usub"];

   $sql = "UPDATE subject set subject_name = '$sub' , sem_id = $semid ,department_id = $did WHERE
           subject_id = $sid";

    // $sql = "INSERT INTO subject (subject_name,sem_id,department_id)
    //     VALUES ('".$sub."','".$sid."','".$did."')";
    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'subject.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'subject.php'; </script> ";
}

}



//====================== Update Departments ==============================

if(isset($_POST['updateDep'])) {
    $did=$_POST["did"];
    $dp=$_POST["udep"];

    $sql = "UPDATE department set department_name = '$dp' WHERE department_id = $did";

    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'department.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'department.php'; </script> ";
}

}






//====================== Update TimeTables ==============================

 if(isset($_POST['updateTime'])) {
    
    $tsid=$_POST["tsid"];
    $sub=$_POST["usub"];
    $tmid=$_POST["utime"];
    $day=$_POST["uday"];
    $rid=$_POST["urid"];
    $tid=$_POST["utid"];

    // $sql1 = "UPDATE timeschedule set subject_id = 0,time_id = 0, day = 0, room_id = 0,teacher_id = 0 WHERE timeschedule_id = $tsid";

    // mysqli_query($conn, $sql1)


if((checkTeacher($tmid,$day,$rid,$tid) == 'Available') && (checkRoom($tmid,$day,$rid) == 'Available'))
{


    $sql = "UPDATE timeschedule set subject_id = $sub,time_id = $tmid, day = $day, room_id = $rid,teacher_id = $tid WHERE timeschedule_id = $tsid";

    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
    // echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";

}

}else{

 echo "<script type='text/javascript'>alert('Time Slot Already Assigned')</script>";
      echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";    

}

}


mysqli_close($conn);

function checkTeacher($tmid,$day,$rid,$tid){

    $conn=mysqli_connect('localhost','root','','timetable');
    
    $result = mysqli_query($conn,
        "SELECT * FROM timeschedule WHERE 
         time_id = $tmid and 
         day = $day and 
         -- room_id = $rid and 
         teacher_id = $tid ");

    $rowcount=mysqli_num_rows($result);
    
    if($rowcount > 1)
    {    mysqli_close($conn);

        return 'Assigned';
    }else{
        mysqli_close($conn);

    return 'Available';
}

}




function checkRoom($tmid,$day,$rid){
        $conn=mysqli_connect('localhost','root','','timetable');
    
    $result = mysqli_query($conn,
        "SELECT * FROM timeschedule WHERE 
         time_id = $tmid and 
         day = $day and 
         room_id = $rid");

    $rowcount=mysqli_num_rows($result);
    
    if($rowcount > 1)
    {    mysqli_close($conn);

        return 'Assigned';
    }else{
        mysqli_close($conn);

    return 'Available';
}
}
//....................................
if(isset($_POST['updateUni'])) {
	 
    $did=$_POST["uid"];
    $dp=$_POST["uname"];

    $sql = "UPDATE University set uname = '$dp' WHERE uid = $did";
 $conn=mysqli_connect('localhost','root','','timetable');
    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'Uni.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Updation Failed! (Server Error)')</script>";
     //echo "<script type = 'text/javascript'>window.location.href = 'Uni.php'; </script> ";
}

}


  ?>