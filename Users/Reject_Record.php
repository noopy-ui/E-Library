<?php
session_start();

$R_ID=$_GET['R_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"update borrowing_records set Status='Rejected' where ID ='$R_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('Record Status Has Been Rejected Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Borrowing_Records_List.php';
        </script>";

?>