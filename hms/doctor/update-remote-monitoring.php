
<?php
session_start();
error_reporting(E_ALL);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

?>

<?php	
if(!$con) 
{ 
	die(" Connection Error "); 
}

$rid = $_GET['GetBorrower'];
$query = "SELECT * FROM remotemonitor
			WHERE rid='".$rid."'";

$result = mysqli_query($con, $query);

while($row=mysqli_fetch_assoc($result))
{
	$rid = $row['rid'];
	
	$blood_group=$row['blood_group'];
	$glucose_lev=$row['glucose_lev'];
	$blood_pressure=$row['blood_pressure'];
	$weight=$row['weight'];
	$diethistory=$row['diethistory'];
	$remotelink=$row['remotelink'];
	$remote_time = $row['remote_time'];
	$remote_date = $row['remote_date'];
	
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>User  | Remote Monitoring</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">User | Remote Monitoring</h1>
</div>
<ol class="breadcrumb">
<li>
<span>User</span>
</li>
<li class="active">
<span>Remote Monitoring</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-14">
<div class="row margin-top-40">
<div class="col-lg-10 col-md-15">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Remote Monitoring</h5>
</div>
<div class="panel-body">
<form action="Update_Remote_Monitor.php?GetBorrower=<?php echo $rid ?>" method="POST">


<div class="form-group">
<label for="doctorname">
ID
</label>
<input type="text" id="rid" name="rid"  class="form-control" value="<?php echo $rid ?>" disabled>
</div>

<div class="form-group">
<label for="doctorname">
Blood Group
</label>
<input type="text" name="blood_group" class="form-control"  value="<?php echo $blood_group ?>" >
</div>

<div class="form-group">
<label for="fess">
Glucose Level
</label>
<input type="text" name="glucose_lev" class="form-control"  value="<?php echo $glucose_lev ?>" >
</div>

<div class="form-group">
<label for="fess">
Blood Pressure
</label>
<input type="text" name="blood_pressure" class="form-control"  value="<?php echo $blood_pressure ?>" >
</div>


<div class="form-group">
<label class="block">
Weight
</label>
</label>
<input type="text" name="weight" class="form-control"  value="<?php echo $weight ?>" >
</div>


<div class="form-group">
<label for="fess">
Diet History
</label>
</label>
<input type="text" name="diethistory" class="form-control"  value="<?php echo $diethistory ?>" >
</div>

<div class="form-group">
<label for="fess">
Remote Link</label>
</label>
<input type="text" name="remotelink" class="form-control" value="<?php echo $remotelink ?>" >
</div>


<div class="form-group">
<label for="fess">
Remote Monitoring Time
</label>
</label>
<input type="time" name="remote_time" class="form-control"  value="<?php echo $remote_time ?>" >
</div>

<div class="form-group">
<label for="fess">
Remote Monitoring Date
</label>
</label>
<input type="date" name="remote_date" class="form-control"  value="<?php echo $remote_date ?>" >
</div>

<input type="submit" id="saveButton" name="Update" value="Update" onclick="UpdateBorrower()">
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>
