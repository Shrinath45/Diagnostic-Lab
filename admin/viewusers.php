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
     .appointment{
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
     
     table{
         width: 100%;
         border-collapse: collapse;
         margin-top: 30px;
         padding: 10px;
     }
     
     table tr th, table tr td {
         border: 1px solid #ddd;
         padding: 10px;
         text-align: center;
     }
     
     tr th{
         background-color: #2ecc71;
         color: white;
     }
     
     tr td{
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

	<main class="appointment">
		<h1 class="text-center pt-3 fs-1 text-success fw-bold">Users Information</h1>
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
			<tbody>
				<?php 
					$sql3="SELECT  * FROM  user " ;
					$result3=$mysqli->query($sql3);
					if(mysqli_num_rows($result3)>=1){
						while ($row3=$result3->fetch_assoc()) {

							$userid = $row3['userid'];
							$name = $row3['Name'];
							$contact = $row3['ContactNumber'];
							$email = $row3['Email'];
							$address = $row3['Address'];
					
							echo "<tr>";
							echo "<th scope='row'>$userid</th>";
							echo "<td>$name</td>";
							echo "<td>$contact</td>";
							echo "<td>$email</td>";
							echo "<td>$address</td>";
							echo "</tr>";

						}
					}
				?>
			</tbody>
		</table>
	</main>
</body>
</html>