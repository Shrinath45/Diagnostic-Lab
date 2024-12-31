<?php 
	// include('../public/datafield/bookserver.php');
	include('../public/datafield/server.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet"  href="style5.css" type="text/css">
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
     <h5 style="margin-top: 5rem; font-size: 60px; color: black; text-align: center; color: black; font-style: italic;"   class="shri">Welcome To Diagnostic Lab - Admin Panel</h5>

</body>
</html>