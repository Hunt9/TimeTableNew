<?php
require("class.phpmailer.php");
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'cIrclesLTD786';// Change this to your gmail password
        $mailer->From = 'mailfromtimetable@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Time Table'; // This will reflect as from name in the email to be sent
        $mailer->Body = 'This is the body of your email.';
        $mailer->Subject = 'Testing Email';
        $mailer->AddAddress('tabassum.fatima@talkontext.com');  // This is where you want your email to be sent
        if(!$mailer->Send())
        {
           echo "Message was not sent<br/ >";
           echo "Mailer Error: " . $mailer->ErrorInfo;
        }
        else
        {
           echo "Message has been sent";
        }
?>