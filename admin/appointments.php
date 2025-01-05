<?php
include('../public/datafield/server.php'); // Database connection
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Appointments</title>
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
     
     table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto p-lg-3">
                        <li class="nav-item"><a href="./home.php" class="nav-link text-danger fs-5 fw-bold">Home</a></li>
                        <li class="nav-item"><a href="./viewusers.php" class="nav-link fs-5 text-danger fw-bold">View Users</a></li>
                        <li class="nav-item"><a href="./appointments.php" class="nav-link fs-5 text-danger fw-bold">Appointments</a></li>
                        <li class="nav-item"><a href="./feedback.php" class="nav-link fs-5 text-danger fw-bold">Feedback</a></li>
                        <li class="nav-item"><a href="./index.php" class="nav-link fs-5 text-danger fw-bold">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main id="view" class="appointment">
        <div >
            <h1 class="text-center text-success mt-2 text-bold">Appointments</h1>
            <table class="table table-striped mt-5">
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

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['AppoID'];
                            $userid = $row['userid'];
                            $pname = $row['Pname'];
                            $date = $row['Date'];
                            $time = $row['Time'] ?: 'Not Set';
                            $status = $row['Status'];

                            $testArray = @unserialize($row['Test']);
                            $test = ($testArray && is_array($testArray)) ? implode(", ", $testArray) : 'Not Specified';

                

                            echo "<tr>
                                    <td>$userid</td>
                                    <td>$id</td>
                                    <td>$pname</td>
                                    <td>$date</td>
                                    <td>$time</td>
                                    <td>$test</td>
                                    <td id='status$id'>$status</td>
                                    <td>
                                        <button class='btn btn-warning' data-bs-toggle='modal' id='updatebtn$id'  data-bs-target='#updateModal$id'>Update Status</button>
                                        <button class='btn btn-success bi bi-upload' id='uploadbtn$id' data-bs-toggle='modal' data-bs-target='#result$id'> Upload PDF</button>
                                    </td>
                                </tr>";

                            // Modal
                            echo "<div class='modal fade' id='updateModal$id' tabindex='-1' aria-labelledby='updateModalLabel$id' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <form method='POST' action='update_status.php'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='updateModalLabel$id'>Update Status</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form method='post'>
                                                        <input type='hidden' name='appoid' value='$id'>
                                                        <label for='ustatus' class='form-label'>Select Status:</label>
                                                        <select class='form-select' name='ustatus' required>
                                                            <option value='Pending' " . ($status === 'Pending' ? 'selected' : '') . ">Pending</option>
                                                            <option value='Confirmed' " . ($status === 'Confirmed' ? 'selected' : '') . ">Confirmed</option>
                                                            <option value='Completed' " . ($status === 'Completed' ? 'selected' : '') . ">Completed</option>
                                                            <option value='Canceled' " . ($status === 'Canceled' ? 'selected' : '') . ">Canceled</option>

                                                            
                                                        </select>

                                                        <button type='button' class=' mt-4 btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                        <button type='submit' class='mt-4 btn btn-warning' name='update1'>Update</button>
                                                    </form>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>";


                            echo "<div class='modal fade' id='result$id' tabindex='-1' aria-labelledby='resultModalLabel$id' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <form method='POST' action='upload_treat.php'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='updateModalLabel$id'>Add Result</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form method='POST' enctype='multipart/form-data' action='upload_treat.php'>
                                                        <input type='hidden' name='appoid' value='$id'>
                                                        <label for='pdf_file' class='form-label'>Upload Result:</label>         
                                                        <input type='file' name='pdf_file' id='pdf_file' accept='application/pdf' required>
                                                        <button type='submit' id='uploadbtn' class='btn btn-warning' name='upload'>Upload PDF</button>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No appointments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
</main>
</body>
<script>
    document.querySelectorAll("tbody tr").forEach((row) => {
    const statusElement = row.querySelector("[id^='status']"); // Status cell
    const uploadBtn = row.querySelector("[id^='uploadbtn']"); // Upload button
    const updateBtn = row.querySelector("[id^='updatebtn']"); // Update button

    if (statusElement) {
        const statusText = statusElement.textContent.trim();

        // Hide buttons based on the status
        if (statusText !== "Completed") {
            uploadBtn?.classList.add("d-none"); // Hide upload button if not "Completed"
        } else {
            updateBtn?.classList.add("d-none"); // Hide update button if "Completed"
        }
    }
});
</script>


</html>
