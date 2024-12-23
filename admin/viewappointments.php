<?php include '../../datafield/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Diagnostic<span>Lab</span></h1>
		<nav>
		


		
		<ul> 
			
		
		    <li><a href="home.php">Home</a></li>
			<li><a href="add.php">Add/Delete Members</a></li>
			<li><a href="viewstaff.php">View Members</a></li>
			<li><a href=" viewusers.php">View Users</a></li>
			<li><a href="viewappointments.php">View Appointments</a></li>
			<li><a href="feedback.php">FeedBack</a></li>

			<li><a href="../../index.php">Logout</a></li>

			


	
			

		</ul>
		



	</nav>




</header>

<body>
	<h1 style="margin-left:40% ;margin-top:80px"   class="asd"> Appointments </h1>
	<table class="table4">
		<tr>
		<th>Appointment ID</th>
		<th>Patient Name</th>
		<th>Date & Time</th>
		<th>Tests</th>
		<th>Address</th>
		<th>Contact No.</th>
		<th>Email</th>
		<th>Status</th>
		

		</tr>

		<?php 
		$sql3="SELECT  * FROM  ua WHERE Status='Confirmed'" ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3["Pname"]."</td><td>".$row3["Date"]."</td><td>".$row3['Test']."</td><td>".$row3['Address']."</td><td>".$row3['ContactNo']."</td><td>".$row3['Email']."</td><td>".$row3['Status']."</td></tr>";
			}


			echo "</table>";
	


		}

		?>
		
	</table>
</body>
</html>