<?php
session_start();

$R_ID=$_GET['R_ID'];
$B_ID=$_GET['B_ID'];


$Return_Date = date("Y-m-d");


require_once('../includes/config.php');

mysqli_query($dbConn,"update borrowing_records set Status='Returned', Return_Date='$Return_Date' where ID ='$R_ID'");
mysqli_query($dbConn,"update books set Borrowing_Status='Active' where ID ='$B_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('Record Status Has Been Rejected Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Borrowing_Records_List.php';
        </script>";

?>