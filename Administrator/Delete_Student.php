<?php
session_start();

$S_ID=$_GET['S_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from borrowing_records where Student_ID='$S_ID'");
mysqli_query($dbConn,"delete from students where ID='$S_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Student Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Students_List.php';
        </script>";

?>