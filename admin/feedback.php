<?php 
	// include('../public/datafield/bookserver.php');
	include('../public/datafield/server.php');
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css">
	<link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body>
	<header>
		<nav class="navbar navbar-expand-lg text-light d-flex flex-wrap bg-dark">
				<div class="container-fluid">
					<h1 class="title navbar-brand fs-1 text-success">Shri<span class="lab text-white">Laboratory</span></h1>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto ul p-lg-3 ">
							<li class="nav-item">
								<a href="./home.php" class="nav-link text-danger fs-5 fw-bold">Home</a>
							</li>
							<li class="nav-item">
								<a href="./viewusers.php" class="nav-link fs-5 text-danger fw-bold">View Users</a>
							</li>

							<li class="nav-item">
								<a href="./viewappointments.php" class="nav-link text-danger fs-5 fw-bold">Appointments</a>
							</li>
							<li class="nav-item">
								<a href="./feedback.php" class="nav-link fs-5 text-danger fw-bold">Feedback</a>
							</li>
							<li class="nav-item">
								<a href="./index.php" class="nav-link fs-5 text-danger fw-bold">Logout</a>
							</li>
							
						</ul>
					</div>
					
				</div>
		</nav>
	</header>

	<main>
		<h1 style="margin-left:35% ;margin-top:80px"   class="asd">Patients FeedBack</h1>
		<table class="table4" style="width: 100%">
			<tr>
				<th>Sr. No.</th>
				<th>Appointment ID</th>
				<th>Patient Name</th>
				<th>FeedBack</th>
				<th>Test</th>
				<th>Email</th>
			

			</tr>

			<?php $sql3="SELECT  * FROM  bookappointment,Pfeedback WHERE Pid=AppoID " ;
				$result3=$mysqli->query($sql3);
				if(mysqli_num_rows($result3)>=1){
					while ($row3=$result3->fetch_assoc()) {

						echo "<tr><td>".$row3["Sr. No."]."</td><td>".$row3["AppoID"]."</td><td>".$row3["Pname"]."</td><td>".$row3['feedback']."</td><td>".$row3["Test"]."</td><td>".$row3["Email"]."</td></tr>";
					}
					echo "</table>";
				}
			?>
		</table>
	</main>

	
</body>
</html>