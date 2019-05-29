<?php 
session_start();
unset($_SESSION['sem_id']);
unset($_SESSION['name']);
unset($_SESSION['e_id']);
unset($_SESSION['stu_id']);
session_destroy();
echo "<script type = 'text/javascript'>window.location.href = '../index.php'; </script> ";

?>