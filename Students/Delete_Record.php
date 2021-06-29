<?php
session_start();

$R_ID=$_GET['R_ID'];

$Status=$_GET['Status'];

require_once('../includes/config.php');


if ($Status=='Accepted' || $Status=='Returned'){
	
	
	echo "<script language='JavaScript'>
			  alert ('Sorry ... This Record Already Accepted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='My_Borrowing_Books.php';
        </script>";
	
	
}else{
	
	mysqli_query($dbConn,"delete from borrowing_records where ID='$R_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Record Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='My_Borrowing_Books.php';
        </script>";
	
	
}




?>