<?php
session_start();

$B_ID=$_GET['B_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from borrowing_records where Book_ID ='$B_ID'");
mysqli_query($dbConn,"delete from books where ID='$B_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Book Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Books_List.php';
        </script>";

?>