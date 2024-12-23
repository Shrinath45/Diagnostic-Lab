<?php include '../../datafield/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Panel</title>
	<link rel="stylesheet"  href="add.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1 style="color: #423289;">Diagnostic<span>Lab</span></h1>
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
<form method="post" action="cancel.php" class="add" enctype="multipart/form-data">







<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


		<div class="input-group">
	<label style="font-weight: bold;">Patient ID</label>
	   <input type="text" name="AppoID2" class="xd">


</div>





<div class="input-group">
	<button type="submit" name="SearchPAB" class="btn">Search</button>
</div>



<?php  


  if (isset($_POST['SearchPAB'])) {
	

$AppoID2 = mysqli_real_escape_string($mysqli,$_POST['AppoID2']);

$query="SELECT * FROM bookAppointment WHERE AppoID=('$AppoID2')";
$result2=mysqli_query($mysqli,$query);



	
while ($row2=mysqli_fetch_assoc($result2)) {
?>

<div class="input-group">
	<label>Patient ID</label>
	<input type="text" name="AppoID" value="<?php echo $row2['AppoID']; ?>">

</div>




<div class="input-group">
	<label>Name</label>
	<input type="text" name="Pname" value="<?php echo $row2['Pname']; ?>">
</div>

<div class="input-group">
	<label>Test</label>
	<input type="text" name="Test" value="<?php echo $row2['Test']; ?>">
</div>
<div class="input-group">
	<label>Date</label>
	<input type="text" name="Date" value="<?php echo $row2['Date']; ?>">
</div>

<div class="input-group">
	<label>Address</label>
	<input type="text" name="Address" value="<?php echo $row2['Address']; ?>">
</div>

<div class="input-group">
	<label>Email</label>
	<input  type="text" name="Email" value="<?php echo $row2['Email']; ?>">
</div>

<div class="input-group">
	<label>Contact No.</label>
	<input  type="text" name="ContactNo" value="<?php echo $row2['ContactNo']; ?>">
</div>

<div class="input-group">

	       <label>Confirmation</label>
           <select name="status" id="status" class="input-group" style="width: 430px; padding: 6px; border-radius: 5px; font-size: 20px;">
		       <option value=""></option>
	           <option value="Confirmed">Confirm Appointment</option>
	           <option value="Canceled">Cancel Appointment</option>
           </select>

 </div>


 <div class="input-group">
		<button type="submit" name="AddC" value="upload" class="btn">Add</button>
		</div>


<?php  

}
 ?>

		 </div>


  
<?php 
}


	?>




	<?php  


if (isset($_POST['AddC'])) {
include ('../../datafield/errors.php');

$AppoID2  = $mysqli -> real_escape_string($_POST['AppoID']);
$Pname 	  = $mysqli -> real_escape_string($_POST['Pname']);
$Test 	  = $mysqli -> real_escape_string($_POST['Test']);
$Email	  = $mysqli -> real_escape_string($_POST['Email']);
$Date	  = $mysqli -> real_escape_string($_POST['Date']);
$Address  = $mysqli -> real_escape_string($_POST['Address']);
$Status	  = $mysqli -> real_escape_string($_POST['status']);
$ContactNo	  = $mysqli -> real_escape_string($_POST['ContactNo']);



if (empty($Status)) {
array_push($errors,"Status is required");

}








if(count($errors)==0){



$sql7 =  "INSERT INTO `ua` (`AppoID`, `Pname`, `Date`, `Test`, `Address`, `ContactNo`, `Email`, `Status`) VALUES ('$AppoID2','$Pname','$Date','$Test','$Address','$ContactNo','$Email', '$Status') ";
if ($mysqli -> query($sql7)) { ?>

<h2 class="thanks"> <?php printf("Appointment Confirmation is Added",$mysqli->affected_rows);?></h2>
		
		
	<?php 
}
}
}

?>

</form>
</form>


	
<!-- <form method="post" action="cancel.php">

	<?php include ('../../datafield/errors.php') ;?>

	<div class="input-group">
		<label>Appointment ID</label>
		<input type="text" name="AppoID2" >

	</div>

	<div class="input-group">

	       <label>Confirmation</label>
           <select name="status" id="status" class="input-group" style="width: 430px; padding: 6px; border-radius: 5px; font-size: 20px;">
		       <option value=""></option>
	           <option value="Confirmed">Confirm Appointment</option>
	           <option value="Canceled">Cancel Appointment</option>
            </select>

	    </div>

	<div class="input-group">
		<button type="submit" name="cancel2" class="btn" style="background-color: #423289;">Cancel</button>
	</div>

	







		</form>
	</form> -->


</body>
</html>


