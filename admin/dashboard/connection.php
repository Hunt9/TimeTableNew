<?php
$con=mysqli_connect('localhost','root','','time_table');
if ($con->connect_errno) echo "Error - Failed to connect to database: " . $con->connect_error;
?>