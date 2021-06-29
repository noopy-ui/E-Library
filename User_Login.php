<?php
session_start();

include 'includes/config.php';

	$Error ='';


if(isset($_POST['Submit']))
{
	
	
$Username=$_POST['Username'];
$Password=$_POST['Password'];



$query = mysqli_query($dbConn,"SELECT * FROM users WHERE Username='$Username' AND Password='$Password'"); 
		

if (mysqli_num_rows($query)>0)
{

$row=mysqli_fetch_array($query);
$U_ID=$row['ID'];
$_SESSION['U_Log'] = $U_ID;


	  
echo '<script language="JavaScript">
            document.location="Users/";
        </script>';
	
}
else
{

$Error = 'Sorry ! Check Your Access Information Or Your Status With Administrator !';


}
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Library - User Portal | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	        	<link rel="shortcut icon" href="img/logo.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}



.form-group {
  position: relative
}
.form-group input[type="password"] {
  padding-right: 30px
}
.form-group .glyphicon {
  right: 10px;
  position:absolute;
  top:29px
}



</style>





</head>

<body class="white-bg" class="" style="background-color:#fff">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            
       
                <img src="img/logo.png" class="img-rounded" width="90%"/>

            </div>
                    <h2 class="font-bold">User Login</h2>
            
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
			            <p style="color:black">Please enter the username & password for the user</p>


            <form class="m-t" role="form" method="post" action="User_Login.php">
                <div class="form-group">
                   Username <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                </div>
				



                <div class="form-group">
                  Password  <input type="password" id="password" class="form-control" placeholder="Password" name="Password" required="">
				  				<span class="glyphicon glyphicon-eye-open"></span>

				</div>
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b">Login</button>
                <button type="reset" name="Reset" class="btn btn-danger block full-width m-b">Clear</button>
			
				<font style="color:red"><?php echo $Error; ?></font>
				
				
			   </div>

			</form>




  <p class="m-t"> <small><br>E-Library © 2020. All Rights Reserved </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>


<script>
$(".glyphicon-eye-open").on("click", function() {
$(this).toggleClass("glyphicon-eye-close");
  var type = $("#password").attr("type");
if (type == "text"){ 
  $("#password").prop('type','password');}
else{ 
  $("#password").prop('type','text'); }
});
</script>


