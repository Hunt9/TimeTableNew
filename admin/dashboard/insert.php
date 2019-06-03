<?php
    $conn=mysqli_connect('localhost','root','','timetable');
            require("phpmailer/class.phpmailer.php");

    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);

//====================== Insert Rooms ==============================

  	if(isset($_POST['insertBr'])) {
		$br=$_POST["br"];
		$room=$_POST["room"];
		$seat=$_POST["seat"];
		$sql = "INSERT INTO room (name,seats,building_id)
        VALUES ('".$room."','".$seat."','".$br."')";
		if (mysqli_query($conn, $sql)) {
     
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
} else {
      echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
}


	}


//====================== Insert Buildings ==============================

  if(isset($_POST['insertBuiliding'])) {
    $building =$_POST["building"];

    $sql = "INSERT INTO building (name)
        VALUES ('".$building."')";
    if (mysqli_query($conn, $sql)) {
     
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'br.php'; </script> ";
}
}



//====================== Insert Departments ==============================

if(isset($_POST['insertDep'])) {
    $dp=$_POST["dep"];
    $sql = "INSERT INTO department (department_name)
        VALUES ('".$dp."')";
    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'department.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'department.php'; </script> ";
}

}


//====================== Insert Subjects ==============================

 if(isset($_POST['insertSub'])) {
    $did=$_POST["dep"];
    $sid=$_POST["sem"];
    $sub=$_POST["sub"];
    $sql = "INSERT INTO subject (subject_name,sem_id,department_id)
        VALUES ('".$sub."','".$sid."','".$did."')";
    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'subject.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'subject.php'; </script> ";
}

}



  if(isset($_POST['insertT'])) {
    $nme=$_POST["nme"];
    $eml=$_POST["eml"];
    $cnt=$_POST["contact"];
    $pass=$_POST["pass"];
        $rpass=$_POST["rpass"];
        $add=$_POST["add"];
                $did=$_POST["dep"];
                if($pass==$rpass)
                {
    $sql = "INSERT INTO teacher (name,eid,password,mob,address,department_id)
        VALUES ('".$nme."','".$eml."','".$pass."','".$cnt."','".$add."','".$did."')";
   if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
}

                }
                else
                {
                   echo "<script type='text/javascript'>alert('Password Not Matched!')</script>";
                   echo "<script type = 'text/javascript'>window.location.href = 'teacher.php'; </script> ";
                }

  }


if(isset($_POST['insertevent'])) {
    $name=$_POST["ename"];
    $discrip=$_POST["ediscrip"];
    $date=$_POST["edate"];
    $starttime=$_POST["estime"];
    $endtime=$_POST["eetime"];
    $sql = "INSERT INTO event (name,description,date,start_time,end_time)
        VALUES ('".$name."','".$discrip."','".$date."','".$starttime."','".$endtime."')";
   if (mysqli_query($conn, $sql)) {

    notifystaff('event');
    notifystudent();

     echo "<script type = 'text/javascript'>window.location.href = 'event.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'event.php'; </script> ";
}

}




if(isset($_POST['insertmeeting'])) {
    $name=$_POST["ename"];
    $discrip=$_POST["ediscrip"];
    $date=$_POST["edate"];
    $starttime=$_POST["estime"];
    $endtime=$_POST["eetime"];
    $sql = "INSERT INTO meeting (name,description,date,start_time,end_time)
        VALUES ('".$name."','".$discrip."','".$date."','".$starttime."','".$endtime."')";
   if (mysqli_query($conn, $sql)) {

    notifystaff('meeting');

     echo "<script type = 'text/javascript'>window.location.href = 'meeting.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'meeting.php'; </script> ";
}

}






//====================== Insert TimeTables ==============================

 if(isset($_POST['insertTime'])) {
    $sub=$_POST["sub"];
    $tmid=$_POST["time"];
    // $dte=$_POST["dte"];
    $day=$_POST["day"];
    $rid=$_POST["rid"];
    $tid=$_POST["tid"];
    //echo $tid;

if((checkTeacher($tmid,$day,$rid,$tid) == 'Available') && (checkRoom($tmid,$day,$rid) == 'Available') && (checkSubject($tmid,$day,$sub) == 'Available') )
{


    $sql = "INSERT INTO timeschedule (subject_id,time_id,date,day,room_id,teacher_id)
        VALUES ('".$sub."','".$tmid."','2019-08-08','".$day."','".$rid."','".$tid."')";
    if (mysqli_query($conn, $sql)) {

        notifusers($sub,$tid);

     echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";
} else {
     echo "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
     echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";
}

}else{


 echo "<script type='text/javascript'>alert('Time Slot Already Assigned')</script>";
      echo "<script type = 'text/javascript'>window.location.href = 'index.php'; </script> ";    

}

}




function checkRoom($tmid,$day,$rid){
        $conn=mysqli_connect('localhost','root','','timetable');
    
    $result = mysqli_query($conn,
        "SELECT * FROM timeschedule WHERE 
         time_id = $tmid and 
         day = $day and 
         room_id = $rid");

    if(mysqli_fetch_array($result) != false)
    {    mysqli_close($conn);

        return 'Assigned';
    }else{
        mysqli_close($conn);

    return 'Available';
}
}

function checkSubject($tmid,$day,$sub){
        $conn=mysqli_connect('localhost','root','','timetable');
    
    $result = mysqli_query($conn,
        "SELECT * FROM timeschedule WHERE 
         time_id = $tmid and 
         day = $day and 
         subject_id = $sub");

    if(mysqli_fetch_array($result) != false)
    {    mysqli_close($conn);

        return 'Assigned';
    }else{
        mysqli_close($conn);

    return 'Available';
}
}


function checkTeacher($tmid,$day,$rid,$tid){

    $conn=mysqli_connect('localhost','root','','timetable');
    
    $result = mysqli_query($conn,
        "SELECT * FROM timeschedule WHERE 
         time_id = $tmid and 
         day = $day and 
         -- room_id = $rid and 
         teacher_id = $tid ");

    if(mysqli_fetch_array($result) != false)
    {    mysqli_close($conn);

        return 'Assigned';
    }else{
        mysqli_close($conn);

    return 'Available';
}

}

 

function notifusers($sub,$tid){
        $conn=mysqli_connect('localhost','root','','timetable');



    

    $sql = "SELECT eid FROM teacher WHERE teacher_id = $tid";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 
        $email_id = $row["eid"];

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'cIrclesLTD786';// Change this to your gmail password
        $mailer->From = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Time Table'; // This will reflect as from name in the email to be sent
        $mailer->Body = 'Your Time Table Has Been Updated! Kindly Login To Check Details.';
        $mailer->Subject = 'Update';
        $mailer->AddAddress($email_id);  // This is where you want your email to be sent
        $mailer->Send();
        // if(!$mailer->Send())
        // {
        //    echo "Message was not sent<br/ >";
        //    echo "Mailer Error: " . $mailer->ErrorInfo;
        // }
        // else
        // {
        //    echo "Message has been sent";
        // }


    }
}





    $sql1 = "select st.eid from subject as s 
            inner join semester as sem on sem.sem_id = s.sem_id
            inner join student as st on st.sem_id = s.sem_id
            where s.sem_id =(select sem_id from subject where subject_id = $sub) group by st.eid";

    $result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    while($row = mysqli_fetch_assoc($result1)) {
 
        $email_id = $row["eid"];

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'cIrclesLTD786';// Change this to your gmail password
        $mailer->From = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Time Table'; // This will reflect as from name in the email to be sent
        $mailer->Body = 'Your Time Table Has Been Updated! Kindly Login To Check Details.';
        $mailer->Subject = 'Update';
        $mailer->AddAddress($email_id);  // This is where you want your email to be sent
        $mailer->Send();
        // if(!$mailer->Send())
        // {
        //    echo "Message was not sent<br/ >";
        //    echo "Mailer Error: " . $mailer->ErrorInfo;
        // }
        // else
        // {
        //    echo "Message has been sent";
        // }



    }
}





mysqli_close($conn);

}



function notifystaff($type){
        $conn=mysqli_connect('localhost','root','','timetable');




        $bodyText = "";
        $subjectText = "";

        if($type == 'event')
        {

        $bodyText = "A New Event Has Been Scheduled! . Kindly Login To Check Details";
        $subjectText = "New Event!";

        }else
        {

        $bodyText = "A New Meeting Has Been Scheduled! . Kindly Login To Check Details";
        $subjectText = "New Meeting!";

        }
    

    $sql = "SELECT eid FROM teacher";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 
        $email_id = $row["eid"];

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'cIrclesLTD786';// Change this to your gmail password
        $mailer->From = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Time Table'; // This will reflect as from name in the email to be sent
        $mailer->Body = $bodyText;
        $mailer->Subject = $subjectText;
        $mailer->AddAddress($email_id);  // This is where you want your email to be sent
        $mailer->Send();
   

    }
}



mysqli_close($conn);

}

function notifystudent(){
        $conn=mysqli_connect('localhost','root','','timetable');

        $subjectText = "";
        $bodyText = "";


    $sql = "SELECT eid FROM student";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 
        $email_id = $row["eid"];

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'cIrclesLTD786';// Change this to your gmail password
        $mailer->From = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Time Table'; // This will reflect as from name in the email to be sent
        $mailer->Body = 'A New Event Has Been Scheduled! . Kindly Login To Check Details.';
        $mailer->Subject = 'New Event!';
        $mailer->AddAddress($email_id);  // This is where you want your email to be sent
        $mailer->Send();
   

    }
}


mysqli_close($conn);
}







        mysqli_close($conn);

//====================== Insert Institue ==============================

if(isset($_POST['insertUni'])) {
    $dp=$_POST["uniname"];
    $sql = "INSERT INTO university (uname)
        VALUES ('".$dp."')";
		 $conn=mysqli_connect('localhost','root','','timetable');
    if (mysqli_query($conn, $sql)) {
     echo "<script type = 'text/javascript'>window.location.href = 'Uni.php'; </script> ";
} else {
     echo  "<script type='text/javascript'>alert('Insertion Failed! (Server Error)')</script>";
	 // echo  $sql;
     echo "<script type = 'text/javascript'>window.location.href = 'Uni.php'; </script> ";
}

}






  ?>