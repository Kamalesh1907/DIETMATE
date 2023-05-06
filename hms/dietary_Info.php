<?php
session_start();
error_reporting(E_ALL);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $userid=$_SESSION['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $bmi=$_POST['bmi'];
    $activitylevel=$_POST['activitylevel'];
    $dietarypatterns=$_POST['dietarypatterns'];
    $calories=$_POST['calories'];
    $history=$_POST['history'];
    $medication=$_POST['medication'];
    $query=mysqli_query($con,"INSERT INTO `tbldietaryplan`(`userID`, `Name`, `Age`, `Gender`, `Height`, `Weight`, `BMI`, `Activity_Level`, `Dietary_Patterns`, `Calories`, `History`, `Medication`) values('$userid','$name','$age','$gender','$height','$weight','$bmi','$activitylevel','$dietarypatterns','$calories','$history','$medication')");
    if($query)
    {
        echo "<script>alert('Your Customised Dietary Plan Successfully Created');</script>";
		echo "<script>window.location.href ='dietaryplan.php'</script>";
    }

}
?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Book Appointment</title>
	
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
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	




	</head>
	<body>
		<div id="app">		
		<div style="position: fixed;">
			<?php include('include/sidebar.php');?>
			</div>
			<div class="app-content">
			
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Dietary Infomation</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Dietary Info</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Dietary Infomation</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="book" method="post" >
														


<div class="form-group">
															<label for="DoctorSpecialization">
															 Name
															</label>
															<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							
							<label for="DoctorSpecialization">
															 Age
															</label>
															<div class="form-group">
								<input type="number" id="age" oninput="calculate()" class="form-control" name="age" placeholder="Age" required>
							</div>
							<label for="DoctorSpecialization">
															 Gender
															</label>
															<div class="form-group">
								<select id="gender" oninput="calculate()" class="form-control" name="gender" placeholder="gender" required>
								<option value="male">Male</option>
  <option value="female">Female</option>
</select>
							</div>

							<label for="DoctorSpecialization">
															 Height <small><i>(in Centimenters)</i></small>
															</label>
															<div class="form-group">
								<input type="number" id="height" oninput="calculate()" class="form-control" name="height" placeholder="Height" required>
							</div>

							<label for="DoctorSpecialization">
															 Weight <small><i>(in Kilograms)</i></small>
															</label>
															<div class="form-group">
								<input type="number" id="weight" oninput="calculate()" class="form-control" name="weight" placeholder="Weight" required>
							</div>

							<label for="DoctorSpecialization">
															 BMI
															</label>
															<div class="form-group">
								<input type="text" class="form-control" name="bmi" id="bmi" placeholder="BMI" required>
							</div>
							<label for="DoctorSpecialization">
															 Activity Level
															</label>
															<div class="form-group">
								<select id="activity-level" oninput="calculate()" class="form-control" name="activitylevel" placeholder="Activity Level" required>
								<option value="sedentary">Sedentary (little or no exercise)</option>
  <option value="lightly-active">Lightly Active (light exercise or sports 1-3 days a week)</option>
  <option value="moderately-active">Moderately Active (moderate exercise or sports 3-5 days a week)</option>
  <option value="very-active">Very Active (hard exercise or sports 6-7 days a week)</option>
  <option value="extra-active">Extra Active (very hard exercise or sports, physical job or training twice a day)</option>
</select>
							</div>
							<label for="DoctorSpecialization">
															 Dietary Patterns
															</label>
															<div class="form-group">
								<select id="Dietary Patterns"  class="form-control" name="dietarypatterns" placeholder="Dietary Patterns" required>
								<option value="Vegan">Vegan</option>
  <option value="Non-Vegetarian">Non-Vegetarian</option>
  <option value="Vegetarian">Vegetarian</option>
</select>
							</div>

							<label for="DoctorSpecialization">
															 Calorie Intake
															</label>
															<div class="form-group">
								<input type="text" class="form-control" id="calories" name="calories" placeholder="Calorie Intake" required>
							</div>
							<label for="DoctorSpecialization">
															 User health history
															</label>
															<div class="form-group">
								<input type="text" class="form-control" name="history" placeholder="User health history" required>
							</div>
							<label for="DoctorSpecialization">
															 Type of medication
															</label>
															<div class="form-group">
								<input type="text" class="form-control" name="medication" placeholder="Type of Medication" required>
							</div>


														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Create Meal Plan
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
									</div>
								</div>
							
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
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

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		<script>
		function calculate() {
  var weight = document.getElementById("weight").value;
  var height = document.getElementById("height").value;
  var age = document.getElementById("age").value;
  var gender = document.getElementById("gender").value;
  var activityLevel = document.getElementById("activity-level").value;
  
  if (weight > 0 && height > 0 && age > 0) {
    var bmr;
    
    if (gender == "male") {
      bmr = 88.36 + (13.4 * weight) + (4.8 * height) - (5.7 * age);
    } else if (gender == "female") {
      bmr = 447.6 + (9.2 * weight) + (3.1 * height) - (4.3 * age);
    }
    
    var calories;
    
    if (activityLevel == "sedentary") {
      calories = bmr * 1.2;
    } else if (activityLevel == "lightly-active") {
      calories = bmr * 1.375;
    } else if (activityLevel == "moderately-active") {
      calories = bmr * 1.55;
    } else if (activityLevel == "very-active") {
      calories = bmr * 1.725;
    } else if (activityLevel == "extra-active") {
      calories = bmr * 1.9;
    }
    
    var bmi = weight / ((height/100) * (height/100));
    
    if (calories <= 1350) {
      calories = 1200;
    } else if (calories <= 1650) {
      calories = 1500;
    } else {
      calories = 1800;
    }
    
    document.getElementById("calories").value = calories.toFixed(0);
    document.getElementById("bmi").value = bmi.toFixed(2);
  }
}

		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
