<?php

session_start();
$errors = array();

$mysqli = new mysqli("localhost", "root", "", "shri");

if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}

//////////   USER REGISTRATION ////////////


if (isset($_POST['Register'])) {

	$Name 	= $mysqli->real_escape_string($_POST['Name']);
	$Address 	= $mysqli->real_escape_string($_POST['Address']);
	$ContactNumber	 = $mysqli->real_escape_string($_POST['ContactNumber']);
	$Email 		=  $mysqli->real_escape_string($_POST['Email']);
	$Password 	= $mysqli->real_escape_string($_POST['password']);


    extract($_POST);
	if(strlen($Name)<5){
		$errors[]= ' Please Enter your full Name';
	}

	if(strlen($Name)>30){
		$errors[]= ' Max length of Full name 30 characters not allowed';
	}
	if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $Name))
	{
		$errors[]= 'Invalid Full name. please enter letters without any Digit or Special Symbol';
	}

	if(strlen($ContactNumber)<10){
		$errors[]= ' Contact Number should be 10 Digit.';
	}

	if(strlen($ContactNumber)>10){
		$errors[]= ' Contact Number should be 10 Digit.';
	}

	if(strlen($Email)>40){
		$errors[]= ' Email max length 40 characters not allowed.';
	}

	if(strlen($Password)<8){
		$errors[]= ' The Password must be 8 characters long.';
	}
	if(strlen($Password)>20){
		$errors[]= ' Password max length 20 characters not allowed.';
	}

	$sql4567 = "SELECT * FROM `user` WHERE (Email='$Email' or Name='$Name')";
	$result = mysqli_query($mysqli, $sql4567);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);

		// if($userName==$row['userName']){
		// 	$errors[] = 'Username already exists.';
		// }
		if($Email==$row['Email']){
			$errors[] = 'Email already exists.';
		}
	}

	if (count($errors) == 0) {
		$sql = "INSERT INTO `user` (`Name`, `Address`, `ContactNumber`, `Email`, `Password`) VALUES ('$Name','$Address','$ContactNumber','$Email','$Password')";
		if ($mysqli->query($sql)) {

			$done=45;
		}
		else{
			$errors[] = 'Failed : Something went wrong.';
		}


	}
}



//////////  USER LOGIN /////////

if (isset($_POST['Login'])) {

    $userEmail = $mysqli->real_escape_string($_POST['userEmail']);
    $Password = $mysqli->real_escape_string($_POST['password']);
    if (empty($userEmail)) {
        array_push($errors, "User ID or Email is required");
    }
    if (empty($Password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // $Password = md5($Password); // Assuming you're using MD5 for password hashing.

        $query = "SELECT * FROM `user` WHERE (userid='$userEmail' OR Email='$userEmail') AND Password='$Password'";
        $result = mysqli_query($mysqli, $query);
        $numRows = mysqli_num_rows($result);

        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);

            // Store relevant user details in the session.
            $_SESSION['login_sess'] = "1";
            $_SESSION['userid'] = $row['userid']; // Add the userid to the session.
            $_SESSION['login_Name'] = $row['Name'];

            // Redirect to the index or dashboard page after login.
            header('location: ./index.php');
        } else {
            header("location: ulogin.php?loginerror=" . $userEmail);
        }
    }
}

if (isset($_GET['logout'])) {

	session_destroy();
	usset($_SESSION['userid']);
	header('location:../public/ulogin.php');
}


if (isset($_GET['My info'])) {
	header('location:login.php');
}

$userprofile =isset($_SESSION['Name']);
$query = "SELECT * FROM user WHERE Name=('$userprofile')";
$result = mysqli_query($mysqli, $query);
$col = mysqli_fetch_assoc($result);






///////////////////  Admin Login  ////////////////////

if (isset($_POST['Login3'])) {

		$adminID	= $mysqli->real_escape_string($_POST['adminID']);
		$adminpassword = $mysqli->real_escape_string($_POST['adminpassword']);
		if (empty($adminID)) {
			array_push($errors, "Admin ID is required");
			# code...
		}
		if (empty($adminpassword)) {
			array_push($errors, "Password is required");
			# code...
		}
		if (count($errors) == 0) {
			$queryA = "SELECT * FROM admin WHERE AdminID=('$adminID')AND adminpassword=('$adminpassword')";
			$resultA = mysqli_query($mysqli, $queryA);
			if (mysqli_num_rows($resultA) == 1) {




				$_SESSION['AdminID'] = $adminID;
				$_SESSION['success'] = "you are now logged in";
				header('location:./home.php');
			} else {
				array_push($errors, "The ID/Password not correct");
			}
		}
	}



// Feedback PHP Code //
 

if(isset($_POST['send'])) {
 
$feed1	= $mysqli->real_escape_string($_POST['AppoID3']);
$feed2	= $mysqli->real_escape_string($_POST['name3']);
$feed3	= $mysqli->real_escape_string($_POST['msg']);

if (empty($feed1)) {
	array_push($errors, "Appointment ID is required.");
	# code...
}
if (empty($feed2)) {
	array_push($errors, "Patient name is required.");
	# code...
}
if (empty($feed3)) {
	array_push($errors, "Feedback is required.");
	# code...
}

if (count($errors) == 0) {
	$sqlll = "SELECT * FROM `book` WHERE AppoID='$feed1' ";
	$resultl = mysqli_query($mysqli, $sqlll);
	$numRows = mysqli_num_rows($resultl);

	if($numRows == 1){
		$sqlfeed = "INSERT INTO `feedback` (`AppoID`, `name`, `feedback`) VALUES ('$feed1', '$feed2', '$feed3') ";

	if ($mysqli->query($sqlfeed)) {
		echo  'Feedback Sent Successfully.';
	}
 }
 else{
	echo  'Patient is not found.';
	array_push($errors, "Patient is not found");
 }


	$mysqli->close();
}
}



/////////////  Appointment Booking Code  ///////////

if (isset($_POST['Book'])) {
    $Pname = $mysqli->real_escape_string($_POST['Pname']);
    $Date = $mysqli->real_escape_string($_POST['Date']);
    $Time = $mysqli->real_escape_string($_POST['Time']);
    $Email = $mysqli->real_escape_string($_POST['Email']);
    $Test = $mysqli->real_escape_string(serialize($_POST['test']));
    $Address = $mysqli->real_escape_string($_POST['Address']);
    $Contact = $mysqli->real_escape_string($_POST['Contact']);

    // Ensure user ID is set correctly (from session or POST)
    $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;

    // Validation checks
    $errors = [];
    if (empty($Pname)) { array_push($errors, "Patient Name is required"); }
    if (empty($Date)) { array_push($errors, "Date & Time is required"); }
    if (empty($Test)) { array_push($errors, "Test is required"); }
    if (empty($Address)) { array_push($errors, "Address is required"); }
    if (empty($Contact)) { array_push($errors, "Contact No. is required"); }

    // Check if Date and Time are already booked
    $sql4567 = "SELECT * FROM `book` WHERE Date='$Date' AND Time='$Time'";
    $result = mysqli_query($mysqli, $sql4567);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($Date == $row['Date']) {
            echo 'Date & Time is already booked.';
        }
    }

    // If no errors, insert the data
    if (count($errors) == 0) {
        $sql = "INSERT INTO `book`(`AppoID`, `Pname`, `Date`, `Time`, `Test`, `Address`, `ContactNo`, `userid`, `Email`) 
                VALUES (' ', '$Pname','$Date', '$Time', '$Test','$Address','$Contact','$userid', '$Email')";

        if ($mysqli->query($sql)) {
            // // Get inserted appointment ID
            // $_SESSION['AppoID'] = $mysqli->insert_id;
            // $_SESSION['success'] = "Appointment booked successfully";
			header('location:./index.php#view');
            
            exit;
        } else {
            printf("Error: %d, Can't Book At The Moment.\n", $mysqli->error);
        }
    }
}


// Code To Update the Status of the Appointment

if(isset($_POST['update'])){
    $id=$_POST['appoid'];
    $up=$_POST['ustatus'];

    $sql = "UPDATE `bookAppointment` SET Status='$up' WHERE AppoID ='$id' ";
    $result = mysqli_query($mysqli, $sql);
    if($result){
        header('location: ../viewappointments.php');
    }else{
        echo 'Cannot Update ';
    }
}

?>