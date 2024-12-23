<?php include('../public/datafield/bookserver.php');  ?>
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
	<h1 class="my1"><span class="mys">Appointments</span></h1>

	<table class="table2">
		<tr>
		<th>Appointment ID</th>
		<th>PatientName</th>
		<th>Tests</th>
		<th>DATE & TIME</th>
		<th>PatientAddress</th>
		<th>PatientEmail</th>
		<th>PatientContactNumber</th>

		

		</tr>
		<?php $sqldoc="SELECT  * FROM bookAppointment ";
		$resultdoc=$mysqli->query($sqldoc);
		if(mysqli_num_rows($resultdoc)>= 1){
			while ($rowdoc=$resultdoc->fetch_assoc()) {

				echo "<tr><td>".$rowdoc["AppoID"]."</td><td>".$rowdoc["Pname"]."</td><td>".$rowdoc["Test"]."</td><td>".$rowdoc["Date"]."</td><td>".$rowdoc['Address']."</td><td>".$rowdoc['Email']."</td><td>".$rowdoc["ContactNo"]."</td></tr>";
			}


			echo "</table";
	


		}

		?>
		
	</table>





</body>
</html>

