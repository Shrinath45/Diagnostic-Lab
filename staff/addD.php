<?php include ('../../datafield/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Panel</title>
	<link rel="stylesheet"  href="style3.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Diagnostic<span>Lab</span></h1>
		<nav>
		


		
		<ul> 
		    <li><a href="index2.php">My Info</a></li>
		    <li><a href="book.php">Add Appointment</a></li>
			<li><a href="doctorapp.php">Appointments</a></li>
			<li><a href="cancel.php">Confirm/Cancel Appointment</a></li>
			<li><a href="searchpatient.php">Search Patient</a></li>
			<li><a href="addD.php">Add Description</a></li>
			<li><a href="../../index.php">Logout</a></li>


		</ul>
		



	</nav>




</header>
<body>

<form method="post" action="addD.php" class="add" enctype="multipart/form-data">







	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


			<div class="input-group">
		<label style="font-weight: bold;">Patient ID</label>
	   	<input type="text" name="Patientsearch" class="xd">


	</div>





	<div class="input-group">
		<button type="submit" name="SearchPA" class="btn">Search</button>
	</div>











	<?php  


	  if (isset($_POST['SearchPA'])) {
		

	$Patientsearch = mysqli_real_escape_string($mysqli,$_POST['Patientsearch']);
	
	$query="SELECT * FROM bookAppointment WHERE AppoID=('$Patientsearch')";
	$result2=mysqli_query($mysqli,$query);
	

	
		
	while ($row2=mysqli_fetch_assoc($result2)) {
?>

<div class="input-group">
		<label>Patient ID</label>
		<input type="text" name="descID" value="<?php echo $row2['AppoID']; ?>">

	</div>




	<div class="input-group">
		<label>Name</label>
		<input type="text" name="descName" value="<?php echo $row2['Pname']; ?>">

	</div>

	<div class="input-group">
		<label>Test</label>
		<input type="text" name="Treatment" value="<?php echo $row2['Test']; ?>">
	</div>

	<!-- <div class="input-group">
		<label>Result</label>
		<input type="file" name="pdf">
	</div> -->

	<div class="input-group-add">
		<label>Note</label>
		<input  type="text" name="Note">
	</div>


	 <div class="input-group">
			<button type="submit" name="AddD" value="upload" class="btn">Add</button>
			</div>


	<?php  

	}
	 ?>

			 </div>
	 
		
	   
	  
	 

	 
	
	  
<?php 
}


	    ?>




	    <?php  


if (isset($_POST['AddD'])) {
	include ('../../datafield/errors.php');
	    	$errors=array();

			// $pdf = $_FILES['pdf']['name'];
			// $pdf_type = $_FILES['pdf']['type'];
			// $pdf_size = $_FILES['pdf']['size'];
			// $pdf_tmp_name = $_FILES['pdf']['tmp_name'];
			// move_uploaded_file($pdf_tmp_name,"../../pdf/". $pdf);
	$descID			= $mysqli -> real_escape_string($_POST['descID']);
	$descName 			= $mysqli -> real_escape_string($_POST['descName']);
	$treatment 			= $mysqli -> real_escape_string($_POST['Treatment']);
	$note				= $mysqli -> real_escape_string($_POST['Note']);

	

if (empty($treatment)) {
	array_push($errors,"Treatment is required");
	# code...
}

if (empty($note)) {
	array_push($errors,"Your note is required");
	# code...
}








if(count($errors)==0){



	$sql7 = "INSERT INTO `des` (`AppoID`, `Pname`, `treatment`, `Note`) VALUES ('$descID','$descName','$treatment','$note') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Your Description Is Added",$mysqli->affected_rows);?></h2>
			
			
		<?php 



	}
}
}














?>









</form>





</body>

</html>