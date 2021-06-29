<?php
session_start();

$R_ID=$_GET['R_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from borrowing_records where ID='$R_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Record Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Borrowing_Records_List.php';
        </script>";

?>