<?php 
	// include('../public/datafield/bookserver.php');
	include('../public/datafield/server.php');
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style>
		.feedback{
			background-color: white;
			padding: 15px;
			border-radius: 5px;
			width: 100%;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			margin-bottom: 20px;
		}
		h1{
			color: #2ecc71;
			font-weight: bold;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			padding: 10px;
		}
		table th, table td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: center;
		}
		table th {
			background-color: #2ecc71;
			color: white;
		}
		table tbody td {
			background-color: #f9f9f9;
		}
		table tbody td[colspan] {
			text-align: center;
			color: #888;
			font-style: italic;
		}
		body{
		background-color: #002c54;
	}
	nav{
        background-color: #9fb6c3;
    }
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg text-light d-flex flex-wrap">
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
								<a href="./appointments.php" class="nav-link text-danger fs-5 fw-bold">Appointments</a>
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
	<main id="view" class=" feedback">
        <!-- <div class="feedback"> -->
            <h1 class="text-center text-success text-bold fs-1">Feedbacks</h1>
            <table class="table table-striped mt-5 p-5">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Appointment ID</th>
                        <th>Patient Name</th>
                        <th>Feedback</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql3 = "SELECT * FROM `feedback`";
                    $result = mysqli_query($mysqli, $sql3);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    
                            $AppoID = $row['AppoID'];
                            $srno = $row['SrNo'];
                            $pname = $row['name'];
                            $feedback = $row['feedback'];
                            echo "<tr>
                                    <td>$srno</td>
                                    <td>$AppoID</td>
                                    <td>$pname</td>
                                    <td>$feedback</td>
                                    
                                </tr>";
                            
                        }
                    } else {
                        echo "<tr><td colspan='8'>No Feedback found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        <!-- </div> -->
</main>

	
</body>
</html>