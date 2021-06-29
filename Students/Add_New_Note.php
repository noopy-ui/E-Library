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










$B_ID = $_GET['B_ID'];



if(isset($_POST['Submit']))
{
	
	
$S_ID=$_POST['S_ID'];
$B_ID=$_POST['B_ID'];
$Note=$_POST['Note'];





$insert = mysqli_query($dbConn,"insert into notes (S_ID,B_ID,Note) values ('$S_ID','$B_ID','$Note')");



echo "<script language='JavaScript'>
			  alert ('This Note Has Been Added Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='My_Notes.php?B_ID=".$B_ID."';
        </script>";
	




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
					
					
                    <li class="">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                       
                    </li>
					
					
					
					<li class="">
					<a href="My_Account.php" title="My Account"><i class="fa fa-user"></i> <span class="nav-label">My Account</span></a>
                    </li>
					
					<li class="active">
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

        <div class="row" >
            <div class="col-lg-12" style="background-image: url('img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
                <div class="wrapper wrapper-content">
                        <div class="row">

                          
<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                     <h5>Add New Note</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  <br>
                  
                     <form method="post" action="Add_New_Note.php?B_ID=<?php echo $B_ID; ?>" class="form-horizontal" enctype="multipart/form-data">
                      
					  
					  <input type="hidden" name="S_ID" value="<?php echo $S_ID; ?>"/>
					  <input type="hidden" name="B_ID" value="<?php echo $B_ID; ?>"/>
					  
								


						
								
							
								
								<div class="form-group"><label class="col-sm-2 control-label">Note *</label>

                                    <div class="col-sm-10"><input value="" type="text" name="Note" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
							
								
								
								
								
								
						                           
                                
                               
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
							<center>	<button class="btn btn-primary" type="submit" name="Submit">Add</button>

									<button class="btn btn-danger" type="reset" name="Reset">Cancel</button>
							</center>
                                    </div>
                                </div>

                            </form>

     
                        </div>

						
                        
                    </div>
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
<!-- Custom and plugin javascript -->
   
<!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>





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
<script>


        $(document).ready(function() {
            $('.animation_select').click( function(){
                $('#animation_box').removeAttr('class').attr('class', '');
                var animation = $(this).attr("data-animation");
                $('#animation_box').addClass('animated');
                $('#animation_box').addClass(animation);
                return false;
            });

            var graph2 = new Rickshaw.Graph( {
                element: document.querySelector("#rickshaw_multi"),
                renderer: 'area',
                stroke: true,
                series: [ {
                    data: [ { x: 0, y: 2 }, { x: 1, y: 5 }, { x: 2, y: 8 }, { x: 3, y: 4 }, { x: 4, y: 8 } ],
                    color: '#1ab394',
                    stroke: '#17997f'
                }, {
                    data: [ { x: 0, y: 13 }, { x: 1, y: 15 }, { x: 2, y: 17 }, { x: 3, y: 12 }, { x: 4, y: 10 } ],
                    color: '#eeeeee',
                    stroke: '#d7d7d7'
                } ]
            } );
            graph2.renderer.unstack = true;
            graph2.render();
        });
    </script>
</body>
</html>
