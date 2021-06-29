<?php
session_start();

include("../includes/config.php");


$U_ID = $_SESSION['U_Log'];


if (!$_SESSION['U_Log'])
echo '<script language="JavaScript">
 document.location="../User_Login.php";
</script>';







if(isset($_POST['Submit']))
{
	
	$Category_ID=$_POST['Category_ID'];

$Type=$_POST['Type'];
$Title=$_POST['Title'];
$Description=$_POST['Description'];
$Author_Name=$_POST['Author_Name'];
$ISBN=$_POST['ISBN'];



	$file;
	
move_uploaded_file($_FILES["file"]["tmp_name"], "Books_Pictures/" . $_FILES["file"]["name"]);
      
      $file=$_FILES["file"]["name"];
	  
	$file = 'Books_Pictures/'.$file;
	



	$file2;
	
move_uploaded_file($_FILES["file2"]["tmp_name"], "Books_Files/" . $_FILES["file2"]["name"]);
      
      $file2=$_FILES["file2"]["name"];
	  
	$file2 = 'Books_Files/'.$file2;
	
	


	
	
 
$insert = mysqli_query($dbConn,"insert into books (Category_ID,Type,Title,ISBN,Description,Cover_Picture,Author_Name,File_Path,Status,Borrowing_Status) values ('$Category_ID','$Type','$Title','$ISBN','$Description','$file','$Author_Name','$file2','Active','Active')");





echo "<script language='JavaScript'>
			  alert ('New Book Has Been Added !');
      </script>";	
	  

echo '<script language="JavaScript">
 document.location="View_Books_List.php";
</script>';

}

?>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-Library | User Area</title>

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

<body style="back">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../img/user.png" width="48" height="48"/>
                             </span>
							 

                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><font color="#fff">User Area</font></strong>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="Logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">EL</div>
						
							
                    </li>
                    <li class="">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                    </li>
					
					
					
			
					
                     
					
					
					
					
										    <li class="active">
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Books</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            
                            <li><a href="Add_New_Book.php">Add New Book</a></li>
                            <li><a href="View_Books_List.php">View Books List</a></li>

                        </ul>
                    </li>


					   <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Borrowing Records</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li><a href="View_Borrowing_Records_List.php">View Borrowing Records List</a></li>

                        </ul>
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
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome To E-Library - User Portal</span>
                </li>
                <li class="dropdown">

                    <ul class="dropdown-menu dropdown-messages">


                        <li class="divider"></li>


                    </ul>
                </li>



                <li>
                    <a href="Logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>

            </ul>

        </nav>
        </div>
          <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Books</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New Book </h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  
                  
                     <form method="post" action="Add_New_Book.php" class="form-horizontal" enctype="multipart/form-data">
                                
								
								
							

	<div class="form-group"><label class="col-sm-2 control-label">Category *</label>

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
								
								
								
								
								
								
								
								
								
								
								
	<div class="form-group"><label class="col-sm-2 control-label">Type *</label>

                                    <div class="col-sm-10">
									
									
	<select name="Type" class="form-control required" title="Category Name" required>
  <option disabled selected value>Select Type</option>


<option value="Softcopy">Softcopy</option>
<option value="Hardcopy">Hardcopy</option>

</select>

			
									
									
									
									
									
									
									
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								




						
								 <div class="form-group"><label class="col-sm-2 control-label">Title *</label>

                                    <div class="col-sm-10"><input value="" type="text" name="Title" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
							
								

<div class="form-group"><label class="col-sm-2 control-label">Description *</label>

                                    <div class="col-sm-10"><input value="" type="text" name="Description" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
							
		<div class="form-group"><label class="col-sm-2 control-label">Author Name *</label>

                                    <div class="col-sm-10"><input value="" type="text" name="Author_Name" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
														
								
								
								
			<div class="form-group"><label class="col-sm-2 control-label">ISBN *</label>

                                    <div class="col-sm-10"><input value="" type="text" name="ISBN" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>					
					







<div class="form-group"><label class="col-sm-2 control-label">Cover Picture *</label>

                                    <div class="col-sm-10"><input value="" type="file" name="file" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>					
						                       



<div class="form-group"><label class="col-sm-2 control-label">PDF File</label>

                                    <div class="col-sm-10"><input value="" type="file" name="file2" accept="application/pdf" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>	





							
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
									<button class="btn btn-primary" type="submit" name="Submit">Add</button>

									<button class="btn btn-danger" type="reset" name="Reset">Clear</button>

                                    </div>
                                </div>
                            </form>
                  
     
                        </div>

						
                        
                    </div>
                </div>
             
                
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

   <!-- Mainly scripts -->
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

    <script src="js/plugins/dataTables/datatables.min.js"></script>
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
