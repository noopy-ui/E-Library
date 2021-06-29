<?php
session_start();

include("../includes/config.php");


$S_ID = $_SESSION['S_Log'];


if (!$_SESSION['S_Log'])
echo '<script language="JavaScript">
 document.location="../Student_Signin.php";
</script>';

$sql123 = mysqli_query($dbConn,"select * from students where ID='$S_ID'");
$row123 = mysqli_fetch_array($sql123);
$Uni_Number = $row123['Uni_Number'];
$Name = $row123['Name'];
$Balance_Of_Volations = $row123['Balance_Of_Volations'];




$Current_Date = date("Y-m-d");





$sql = mysqli_query($dbConn,"select * from borrowing_records where Student_ID='$S_ID' AND Status='Accepted'");
if (mysqli_num_rows($sql)>0){
	
	$row = mysqli_fetch_array($sql);
	
	$To_Date = $row['To_Date'];
	
	
	
	
	
	$start = strtotime($Current_Date);
$end = strtotime($To_Date);

$days_between = ceil(abs($end - $start) / 86400);
	
	
if ($days_between>0){


	$R_ID = $row['ID'];
	$S_ID = $row['Student_ID'];


$sql1 = mysqli_query($dbConn,"select * from volations where R_ID='$R_ID' AND Date='$Current_Date'");
if (mysqli_num_rows($sql1)>0){
	
	
	
}else{
	
	$insert = mysqli_query($dbConn,"insert into volations (S_ID,R_ID,Date,Amount) values ('$S_ID','$R_ID','$Current_Date','1')");

	$New_Balance_Of_Volations = $Balance_Of_Volations + 1;
	
	$update = mysqli_query($dbConn,"update students set Balance_Of_Volations='$New_Balance_Of_Volations' where ID='$S_ID'");
	
	
}










}	
	
	
}










if(isset($_POST['Submit']))
{
	

	
$Category_ID = $_POST['Category_ID'];



echo '<script language="JavaScript">
            document.location="Search.php?Category_ID='.$Category_ID.'";
        </script>';
		
		
}




?>
<!DOCTYPE html>
<html>

<head>   


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        	<link rel="shortcut icon" href="../img/logo.png"/>

    <title>E-Library | Student Area</title>

      <link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(../fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}

</style>

</head>

<body class="canvas-menu" style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
    <div id="wrapper" >
        <nav class="navbar-default navbar-static-side" role="navigation" 
		
		
		style="background-color:#931C1F;
			
			
			
			border: 2px solid #931C1F;
  padding: 10px;
  border-top-right-radius: 35px;
  border-bottom-right-radius: 35px;
			
			
			
			
			
			"
		
		
		
		
		>
            <div class="sidebar-collapse" style="background-color:#931C1F"  class="animated" id="animation_box">
			           
					   <a class="close-canvas-menu"><i class="fa fa-times btn btn-primary btn-sm"></i></a>
				
				
				
                 <ul class="nav metismenu" id="side-menu" style="background-color:#931C1F"  >
                <li class="nav-header" style="background-image: url('../img123/logo123.png'); background-size: 50% 50%; background-repeat: no-repeat; border-radius: 20px;">
                        <div >
                            <center><img src="../img/logo.png" style="" width="75%"/></center>
                            
                           
                        </div>
                      
                    </li>
					
					 <li class="">
                       <br>
                    </li>
					
					
                    <li class="active">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                       
                    </li>
					
					
					
					<li class="">
					<a href="My_Account.php" title="My Account"><i class="fa fa-user"></i> <span class="nav-label">My Account</span></a>
                    </li>
					
					<li class="">
					<a href="My_Borrowing_Books.php" title="My Books"><i class="fa fa-book"></i> <span class="nav-label">My Borrowing Books</span></a>
                    </li>
					
					
					
					
					
					
					
                     <li class="">
					<a href="Logout.php" title=""><i class="fa fa-lock"></i> <span class="nav-label">Logout</span></a>
                    </li>
					
					
					
					  
					
					
					
					
					
				
                    
                    
                  

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    
                    <ul class="dropdown-menu dropdown-messages">
                        
                        
                        <li class="divider"></li>
                        
                        
                    </ul>
                </li>
             


                <li >
                    <a style="color:#fff" href="">
                         E-Library | <?php echo $Uni_Number; ?> - <?php echo $Name; ?>
                    </a>
                </li>
                
            </ul>

        </nav>
        </div>
            
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Library Books</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
			
			
			
 <form method="post" action="index.php" class="form-horizontal" enctype="multipart/form-data">
                      
					  
					  
								
								


	<div class="form-group"><label class="col-sm-2 control-label"></label>

                                    <div class="col-sm-10">
									
									
						    <?php	
$query1 = mysqli_query($dbConn,"select * from categories");

echo '<select name="Category_ID" class="form-control required" title="Category Name" required>';
   echo '                                       <option disabled selected value>Select Category Name</option>
';

while ($row1 = mysqli_fetch_array($query1)) {
   echo '<option value="'.$row1['ID'].'">'.$row1['Category_Name'].'</option>';
}
echo '</select>';
?>  			
									
									
									
									
									
									
									
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>


						
								


								
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
							<center>	<button class="btn btn-primary" type="submit" name="Submit">Search</button>

							</center>
                                    </div>
                                </div>

                            </form>
							
							

 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Softcopy Library Books List Information</h5>
                        <div class="ibox-tools">



                        </div>
                    </div>









                          <div class="ibox-content">



                      <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Description</th>
                        <th>Cover Picture</th>
                        <th>Author Name</th>
                        <th>File Path</th>
                        <th>Status</th>
                      					   <th>My Notes</th>
  
                        <th>Add Date / Time</th>




                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql1 = mysqli_query($dbConn,"select * from books where Type='Softcopy' order by ID DESC");
					while ($row1 = mysqli_fetch_array($sql1)){

						$B_ID = $row1['ID'];
						$C_ID = $row1['Category_ID'];



					$sql2 = mysqli_query($dbConn,"select * from categories where ID='$C_ID'");
					$row2 = mysqli_fetch_array($sql2);
					$C_Name = $row2['Category_Name'];
					




						$Title  = $row1['Title'];
						$Description  = $row1['Description'];
						$Picture  = $row1['Cover_Picture'];
						$ISBN  = $row1['ISBN'];
						$Author_Name  = $row1['Author_Name'];
						$File_Path  = $row1['File_Path'];
						$Status  = $row1['Status'];
											
						$Add_Date_Time  = $row1['Add_Date_Time'];



						?>
                    <tr class="grade">
                        <td><?php echo $C_Name; ?></td>

                        <td><?php echo $Title; ?></td>
                        <td><?php echo $ISBN; ?></td>
                        <td><?php echo $Description; ?></td>
                        <td><img src="../Users/<?php echo $Picture; ?>" width="50%"/></td>
                        <td><?php echo $Author_Name; ?></td>
                        <td><a target="_blank" href="../Users/<?php echo $File_Path; ?>" class="btn btn-primary">View File</a></td>
                        <td><?php echo $Status; ?></td>
                       
										<td><a href="My_Notes.php?B_ID=<?php echo $Book_ID; ?>" class="btn btn-danger btn-sm" role="button">My Notes</a></td>

						
						
                        <td><?php echo $Add_Date_Time; ?></td>



 </tr>

                    <?php
					}
					?>

                    </tbody>

                    </table>
                        </div>







                        </div>




















 <div class="ibox-title">
                        <h5>Hardcopy Library Books List Information</h5>
                        <div class="ibox-tools">



                        </div>
                    </div>





                          <div class="ibox-content">



                      <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Description</th>
                        <th>Cover Picture</th>
                        <th>Author Name</th>
                        <th>Status</th>
                        
                        <th>Add Date / Time</th>



                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql1 = mysqli_query($dbConn,"select * from books where Type='Hardcopy' order by ID DESC");
					while ($row1 = mysqli_fetch_array($sql1)){

						$B_ID = $row1['ID'];
						$C_ID = $row1['Category_ID'];



					$sql2 = mysqli_query($dbConn,"select * from categories where ID='$C_ID'");
					$row2 = mysqli_fetch_array($sql2);
					$C_Name = $row2['Category_Name'];
					




						$Title  = $row1['Title'];
						$Description  = $row1['Description'];
						$Picture  = $row1['Cover_Picture'];
						$ISBN  = $row1['ISBN'];
						$Author_Name  = $row1['Author_Name'];
						$File_Path  = $row1['File_Path'];
						$Status  = $row1['Status'];
						$Borrowing_Status  = $row1['Borrowing_Status'];
											
						$Add_Date_Time  = $row1['Add_Date_Time'];



						?>
                    <tr class="grade">
                        <td><?php echo $C_Name; ?></td>

                        <td><?php echo $Title; ?></td>
                        <td><?php echo $ISBN; ?></td>
                        <td><?php echo $Description; ?></td>
                        <td><img src="../Users/<?php echo $Picture; ?>" width="50%"/></td>
                        <td><?php echo $Author_Name; ?></td>
                        <td><?php echo $Status; ?></td>
                       
				
						
						
                        <td><?php echo $Add_Date_Time; ?></td>


 <td><center><a href="JavaScript:if(confirm('Are You Sure To Request This Book ?')==true)
{window.location='Request_Book.php?Borrowing_Status=<?php echo $Borrowing_Status; ?>&B_ID=<?php echo $B_ID; ?>';}" class="btn btn-primary btn-sm" role="button">Request</a></center></td>
 </tr>

                    <?php
					}
					?>

                    </tbody>

                    </table>
                        </div>







                        </div>




















                    </div>
                </div>

<br>
				<br>
                <div class="footer">

                    <div>
                       <center>E-Library © 2020. All Rights Reserved.</center>
                    </div>
                </div>
            </div>
        </div>

        </div>




        </div>
    </div>
  <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="../js/plugins/toastr/toastr.min.js"></script>


      
    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
	
	
</body>
</html>
