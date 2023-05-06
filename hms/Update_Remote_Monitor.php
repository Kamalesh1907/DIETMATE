<?php
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'hms');
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	if(!$con) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_POST['Update']))
	{
		$rid = $_GET['GetBorrower'];
		$blood_group = $_POST['blood_group'];
		$glucose_lev = $_POST['glucose_lev'];
		$blood_pressure = $_POST['blood_pressure'];
		$weight = $_POST['weight'];
		$diethistory = $_POST['diethistory'];
		$remote_time=$_POST['remote_time'];
		$remote_date=$_POST['remote_date'];
		


		$query = "UPDATE remotemonitor 
					SET rid='".$rid."',
				
					blood_group='".$blood_group."', 
					glucose_lev='".$glucose_lev."',
					blood_pressure='".$blood_pressure."',
					weight='".$weight."',

					diethistory='".$diethistory."',
					remote_time='".$remote_time."',
					remote_date='".$remote_date."'

					WHERE rid='".$rid."'";

		$result = mysqli_query($con, $query);
		
		if($result)
		{
			echo "Data successfully updated";
			header("location:manage-remotemonitor.php");
		}
		else
		{
			die("Error updating data !  ".$con->error);
		}
	}

	else
	{
		header("location:subject_list.php");
	}
	
?>