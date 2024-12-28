<?php include('./datafield/server.php'); ?>
<!-- <?php include('./datafield/bookserver.php'); ?> -->
<!-- <?php include('./datafield/errors.php'); ?> -->
<!-- <?php include('./datafield/cancel.php'); ?> -->



<!DOCTYPE html>

<?php 
$mysqli = new mysqli("localhost", "root", "", "shri");
if(!isset($_SESSION['login_sess']))
{
	header("location: ../../loginfield/Ulogin.php");
}
$Name =$_SESSION['login_Name'];
$findresult = mysqli_query($mysqli, "SELECT * FROM `user` WHERE Name=('$Name')");
if($result = mysqli_fetch_array($findresult))
{
	$userName = $result['userName'];
	$Name = $result['Name'];
	$Address = $result['Address'];
	$ContactNumber = $result['ContactNumber'];
	$Email = $result['Email'];
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shri Laboratory</title>
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
   
    <link rel="stylesheet" href="style.css">
    <style>
        * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, sans-serif;
     }
     
     body {
         background-color: #f4f4f4;
     }
     
     header {
         background-color: #333;
         color: white;
         width: 100vw;
         height: 80px;
         position: fixed;
         padding: 0px;
     }
     
     header .logo {
         font-size: 24px;
         font-weight: bold;
     }
     
     header .logo span {
         color: #2ecc71;
     }
     
     header nav a {
         color: white;
         /* margin: 0 15px; */
         text-decoration: none;
     }
     
     
     #view{
         height: 100vh;
         padding: 100px 20px 20px 20px;
         display: flex;
         gap: 20px;
         justify-content: space-between;
         flex-wrap: wrap;
     }
     
     .appointment-section, .confirmed-appointment-section {
         background-color: white;
         padding: 15px;
         border-radius: 5px;
         width: 100%;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
         margin-bottom: 20px;
     }
     
     h1 span {
         color: #2ecc71;
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
     #book{
         padding: 100px 20px 20px 20px;
         height: 100vh;
     }
     #history{
        padding: 100px 20px 20px 20px;
         height: 100vh;
     }
     .form-container {
             background-color: #ffffff;
             border-radius: 10px;
             padding: 40px;
             max-width: 800px;
             margin: 0 auto;
             box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
         }
         .form-container h2 {
             text-align: center;
             margin-bottom: 30px;
             font-weight: 600;
             font-size: 28px;
         }
         .form-control {
             margin-bottom: 15px;
             height: 50px;
             font-size: 16px;
             padding: 10px 15px;
         }
         .btn-book {
             width: 100%;
             background-color: #007bff;
             color: white;
             font-size: 18px;
             padding: 12px;
             border-radius: 8px;
             transition: background-color 0.3s;
         }
         .btn-book:hover {
             background-color: #0056b3;
         }
         .tdiv{
         display: flex;
         flex-direction: column;
         flex-wrap: wrap;
         border: 1px solid black;
         justify-content: center;
         align-items: center;
         height: 600px;
         border-radius: 20px;
         background-color: #333;
 
     }
     .tdiv h1{
         font-size: 40px;
         color: white;
     }
     .tform{
         display: flex;
         flex-wrap: wrap;
         flex-direction: column;
         padding: 50px 50px 20px 50px;
         border: 1px solid gray;
         background-color: gray;
         border-radius: 10px;
     }
     ul li a:hover{
         text-decoration: none;
     }
     /* Responsive Design */
     @media screen and (max-width: 768px) {
         header{
             width: 100%;
             display: flex;
             flex-direction: row;
             justify-content: space-between;
         }
         #view {
             flex-direction: column;
         }
         #navbarSupportedContent{
         float: right;
         margin-left: 0px;
     }
         .form-container {
                 padding: 20px;
             }
             .btn-book {
                 font-size: 16px;
             }
         .appointment-section, .confirmed-appointment-section {
             width: 100%;
         }
         .tdiv{
             width: 100%;
             padding: 0;
             /* justify-content: center;
             align-items: center; */
             display: flex;
             flex-direction: row;
             flex-wrap: wrap;
         }
         .tform{
             padding: 20px;
             
         }
         .tform h1{
             font-size: 20px;
         
         }
         .tdiv h1{
             font-size: 30px;
         }
     }
     #home{
         height: 100vh;
         padding: 100px 20px 20px 20px;
     }
     
 
    
     .page-title {
             text-align: center;
             font-size: 2rem;
         }
         .appointment-table {
             /* margin: 20px auto; */
             width: 100%;
             background-color: white;
             border-radius: 8px;
             padding: 20px;
             box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
         }
         .cancel-btn {
             background-color: #dc3545;
             color: white;
         }
         .cancel-btn:hover {
             background-color: #c82333;
         }
 
 
     #others{
         height: 100vh;
         padding: 130px 50px 20px 50px;
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between;
     }
     
     
     @media screen and (max-width: 480px) {
         header{
             flex-direction: column;
             text-align: center;
         }
         .profile-btn{
             justify-content: center;
             text-align: center;
             margin-left: 80px;
         }
     .tdiv, .tform{
         display: flex;
         flex-direction: row;
         flex-wrap: wrap;
     }
         .form-container {
                 padding: 10px;
             }
             .btn-book {
                 font-size: 10px;
             }
     
         header .logo {
             margin-bottom: 10px;
         }
         #view{
             padding: 80px 0px 80px 0px;
         }
     
         header nav a {
             margin: 5px 0;
         }
     
         table th, table td {
             padding: 3px;
             font-size: 10px;
         }
     }
 
     </style>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg text-light d-flex flex-wrap">
            <div class="container-fluid">
                <h1 class="title navbar-brand fs-1">Shri<span class="lab text-white">Laboratory</span></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto ul">
                        <li class="nav-item">
                            <a href="#home" class="nav-link fs-5 fw-bold">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#book" class="nav-link fs-5 fw-bold">Book Appointment</a>
                        </li>

                        <li class="nav-item">
                            <a href="#view" class="nav-link fs-5 fw-bold">View Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a href="#others" class="nav-link fs-5 fw-bold">Others</a>
                        </li>
                        <li class="profile-dropdown nav-item">
                            <button class="profile-btn nav-link text-center fs-5 text-black fw-bold" onclick="toggleDropdown()">
                                <img src="profile-pic.jpg" alt="" class="profile-pic bg-black">
                                Profile
                            </button>
                            <div class="dropdown-content" id="dropdownMenu">
                                <a href="./profile.php" class="bi bi-person-fill fw-bold"> My Profile</a>
                                <a href="./edit.php" class="bi bi-pencil-square fw-bold"> Edit Profile</a>
                                <a href="./contact.php" class="bi bi-person-lines-fill fw-bold"> Contact Support</a>
                                <a href="#" class="bi bi-door-open-fill fw-bold"> Logout</a>
                            </div>
                        </li>
                        
                        
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>



    <section id="home">
     <h1>Welcome Back <?php echo $result['userName']; ?>!</h1>

    </section>




    <section id="book">
        <div class="form-container">
            <h2>Book Appointment</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="Pname" placeholder="Patient Name" required>
                    </div>
                    <div class="col-md-6">
                        <select name="test" id="test"  class="form-select form-control" aria-label="Select Test" required multiple>
                            <option value="CT Scan">CT Scan</option>
                            <option value="MRI Scan">MRI Scan</option>
                            <option value="Blood Test">Blood Test</option>
                            <option value="ECG Test">ECG Test</option>
                            <option value="EEG Test">EEG Test</option>
                            <option value="Ultrasound Test">Ultrasound Test</option>
                            <option value="X-Ray">X-Ray</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" value="<?php echo $result['Email']; ?>" name="Email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Address" class="form-control" placeholder="Address" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="datetime-local" name="Date" class="form-control" placeholder="Date & Time" required>
                    </div>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="Contact" placeholder="Contact Number" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-book mt-4" name="Book">Book</button>
            </form>
        </div>
    </section>

    <section id="view">
        <div class="appointment-section">
            <h1 class="text-center">My <span>Appointments</span></h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient Name</th>
                        <th>Date & Time</th>
                        <th>Test</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    // $userprofile =isset($_SESSION['Name']);
                    // $query = "SELECT * FROM user WHERE Name=('$userprofile')";

                    $user = isset($_SESSION['Email']);
                    $sql3="SELECT *
        FROM `bookAppointment` AS book
        JOIN `user` AS us
        ON book.Email = us.Email
        WHERE book.Email = '$user'";
                    // $sql3="SELECT  * FROM `bookAppointment` book,user us WHERE book.Email= us.Email";
                    $result = mysqli_query($mysqli, $sql3);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id=$row['AppoID'];
                            $pname = $row['Pname'];
                            $contact = $row['ContactNo'];
                            $email = $row['Email'];
                            $status = $row['Status'];
                            $test = $row['Test'];
                            $date = $row['Date'];
                            $Address = $row['Address'];

                            echo "<tr>";
                            echo "<th scope='row'>$id</th>";
                            echo "<td>$pname</td>";
                            echo "<td>$date</td>";
                            echo "<td>$test</td>";
                            echo "<td>$status</td>";
                            echo "<td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#cancelModal' name='cancel'>Cancel</button></td>";
                            echo "</tr>";

                            echo '<div class="modal" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <p> Are you sure you want to cancel this appointment?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger "><a href="./datafield/cancel.php?cancelid='.$id.' " class="text-decoration-none text-light">Confirm Cancel</a></button>
                    </div>
                </div>
            </div>
        </div>';

                        }
                    }
                    // $result3=$mysqli->query($sql3);
                    // if(mysqli_num_rows($result3) >= 1){
                    //     while ($row3=$result3->fetch_assoc()) {

                    //         echo "<tr>";
                    //         echo "<td>{$row3["AppoID"]}</td>";
                    //         echo "<td>{$row3["Pname"]}</td>";
                    //         echo "<td>{$row3["Date"]}</td>";
                    //         echo "<td>{$row3["Test"]}</td>";
                    //         echo "<td>{$row3["Status"]}</td>";
                    //         echo "<td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#cancelModal' name='cancel'>Cancel</button></td>";
                    //         echo "</tr>";


                    //         // echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3['Pname']."</td><td>".$row3["Date"]."</td><td>".$row3["Test"]."</td><td>".$row3['Address']."</td><td>".$row3['ContactNo']."</td><td>".$row3['Email']."</td><td><button class="btn cancel-btn" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button></td></tr>";
                    //     }
                    // }
                
                ?>
                </tbody>
            </table>
        </div>

        
        <!-- Cancel Confirmation Modal -->
        <!-- <div class="modal" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <p> Are you sure you want to cancel this appointment?</p>
                       <input type="text" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger"><a href=""></a></button>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <section id="others">
        <div class="col-5 tdiv">
            <h1 class="fw-bold fs-1">Treatment History</h1>
            <form action="" class=" w-75 mt-2 tform p-5" method="post">
                <h3 class="fw-bold">Search Treatment History By:</h3>
                <dl class="align-items-center">
                    <dt class="mt-3 fs-5">*Patient Id/Name</dt>
                    <dd><input type="text" name="AppoID4" class="form-control w-100 mt-2" placeholder="Patient ID/Name"></dd>
                    <dt><button type="submit" name="treatmentHistory" onclick="treat()" class="btn btn-primary mt-5 w-100 align-items-center">Search</button></dt>
                </dl>
            </form>
        </div>
        <div class="col-5 tdiv">
            <h1 class="fw-bold">Send Feedback</h1>
            <form action="" class="w-75 mt-2 tform p-5">
                <dl>
                    <dt><input type="text" class="form-control mt-2" placeholder="Appointment ID"></dt>
                    <dt><input type="text" class="form-control mt-3" placeholder="Patient Name"></dt>
                    <dt><textarea name="" id="" class="form-control mt-3 h-25" rows="6" cols="6" placeholder="Write Something..."></textarea></dt>
                    <dt><button class="btn btn-success mt-3 w-100">Send!</button></dt>
                </dl>
            </form>
        </div>

    </section>


    <section id="history" class="d-none">
    <?php
// Only show treatment history if the form is submitted
if (isset($_POST['treatmentHistory'])) {
    // Fetch the Appointment ID from the form input
    $AppoID = $mysqli->real_escape_string($_POST['AppoID4']);

    // SQL query to fetch the treatment history
    $sql11 = "SELECT * FROM des WHERE AppoID='$AppoID' OR Pname='$AppoID'";
    $result11 = $mysqli->query($sql11);
}
?>

<!-- HTML starts here -->
<div class="container">
    <h1 class="text-center">Treatment <span>History</span></h1>

    <!-- Button Form to Show Treatment History -->
    <form method="post" action="">
        <input type="hidden" name="AppoID4" value="<?php echo isset($_POST['AppoID4']) ? $_POST['AppoID4'] : ''; ?>">
        <button type="submit" name="show_treatment_history" style="padding: 5px; background-color: black; color: green;">
            View Test Result
        </button>
    </form>

    <!-- Treatment History Table -->
    <?php if (isset($_POST['treatmentHistory'])): ?>
        <table class="table table-striped" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Test</th>
                    <th>Note</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if any results were returned
                if (mysqli_num_rows($result11) == 0) {
                    echo "<tr><td colspan='5' style='text-align:center; color:red;'>Wrong Appointment ID/Patient Name.</td></tr>";
                } else {
                    // Loop through the results and display them
                    while ($row11 = $result11->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row11['AppoID']}</td>
                                <td>{$row11['Pname']}</td>
                                <td>{$row11['treatment']}</td>
                                <td>{$row11['Note']}</td>
                                <td><a href='path_to_pdf/{$row11['pdf']}' target='_blank'>View PDF</a></td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
    </section>

    

</body>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
<script>

    new MultiSelectTag('test');

    $(document).ready(function(){
    var date = new Date();
    var tdate = date.getDate();
    $("date").datepicker({
    dateFormat: 'dd/mm/yy', minDate: tdate
    });
    });



    function toggleDropdown() {
        document.getElementById("dropdownMenu").classList.toggle("show");
    }

    // Close the dropdown if clicked outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.profile-btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function treat(){
        document.getElementById("history").className.remove = "d-none";
    }
</script>
</html>
