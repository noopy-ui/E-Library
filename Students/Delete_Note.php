<?php
session_start();

$N_ID=$_GET['N_ID'];

$B_ID=$_GET['B_ID'];

require_once('../includes/config.php');


	mysqli_query($dbConn,"delete from notes where ID='$N_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Note Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='My_Notes.php?B_ID=".$B_ID."';
        </script>";
	
	




?>