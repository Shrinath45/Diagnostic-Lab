<?php 
	// include('../public/datafield/bookserver.php');
	include('../public/datafield/server.php');

	// include('../public/datafield/update.php');

	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- <link rel="stylesheet"  href="style5.css"> -->
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
	<h1 class="text-center pt-5 fs-1 text-success-emphasis">Appointments</h1>
	<table class="table table-striped">
            <thead>
                <tr>
					<th>UserID</th>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Test</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql3 = "SELECT * FROM `book`";
                $result = mysqli_query($mysqli, $sql3);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['AppoID'];
						$pname = $row['Pname'];
						$contact = $row['ContactNo'];
						$email = $row['Email'];
						$userid = $row['userid'];
						$status = $row['Status'] ? $row['Status'] : 'Pending';
						
						// Validate and unserialize Test column
						$testArray = @unserialize($row['Test']); // Suppress errors with @
						if ($testArray === false && $row['Test'] !== 'b:0;') {
							$test = 'Invalid Data'; // Handle invalid or corrupted serialized data
						} else {
							$test = is_array($testArray) ? implode(", ", $testArray) : 'Not Specified';
						}

						$date = $row['Date'];
						$time = $row['Time'] ? $row['Time'] : 'Not Set';


                        echo "<tr>";
                        echo "<th scope='row'>$userid</th>";
                        echo "<th scope='row'>$id</th>";
                        echo "<td>$pname</td>";
                        echo "<td>$date</td>";
                        echo "<td>$time</td>";
                        echo "<td>$test</td>";
                        echo "<td>$status</td>";
                        echo "<td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#cancelModal$id' name='cancel'>Update Status</button></td>";
                        echo "</tr>";

                        echo '<div class="modal" id="cancelModal' . $id . '" tabindex="-1" aria-labelledby="cancelModalLabel' . $id . '" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cancelModalLabel' . $id . '">Update Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex">
											<label name="appoid">Appointment ID: ' . $id . '</label>
                                            <select class="w-75 p-2" name="ustatus">
												<option value="pending">Pending</option>
												<option value="confirm">Confirm</option>
												<option value="cancel">Cancel</option>
											</select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-warning" name="update">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo "<tr><td colspan='7'>No appointments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>





		<!-- <h1 style="margin-left:40% ;margin-top:80px"   class="asd"> Appointments </h1>
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
			$sql3="SELECT  * FROM `bookappointment` " ;
			$result3=$mysqli->query($sql3);
			if(mysqli_num_rows($result3)>=1){
				while ($row3=$result3->fetch_assoc()) {

					echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3["Pname"]."</td><td>".$row3["Date"]."</td><td>".$row3['Test']."</td><td>".$row3['Address']."</td><td>".$row3['ContactNo']."</td><td>".$row3['Email']."</td><td>".$row3['Status']."</td></tr>";
				}


				echo "</table>";
		


			}

			?>
			
		</table> -->
	</main>
</body>
</html>