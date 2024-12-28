<?php
// session_start();
$errors = array();

$mysqli = new mysqli("localhost", "root", "", "shri");

if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}


if (isset($_SESSION['username'])) {
    $logged_in_user_id = $_SESSION['user_id'];  // Access the user ID from session

    echo "Logged-in User ID: " . $logged_in_user_id;
} else {
    echo "User is not logged in.";
}

if (isset($_POST['Book'])) {

	$Pname = 	$mysqli->real_escape_string($_POST['Pname']);
	$Date 	=	 $mysqli->real_escape_string($_POST['Date']);
	$Test 	= 	$mysqli->real_escape_string($_POST['test']);
	$Address 	= 	$mysqli->real_escape_string($_POST['Address']);
	$Contact 	= 	$mysqli->real_escape_string($_POST['Contact']);
	$Email 	= 	$mysqli->real_escape_string($_POST['Email']);

	extract($_POST);
	// if (empty($AppoID)) {
	// 	array_push($errors, "Appointment ID is required");
	// }

	if (empty($Pname)) {
		array_push($errors, "Patient Name is required");
	}

	if (empty($Date)) {
		array_push($errors, "Date & Time is required");
		# code...
	}


	if (empty($Test)) {
		array_push($errors, "Test is required");
		# code...
	}

	if (empty($Address)) {
		array_push($errors, "Address is required");
		# code...
	}

	if (empty($Contact)) {
		array_push($errors, "Contact No. is required");
		# code...
	}

	if (empty($Email)) {
		array_push($errors, "Email Id is required");
		# code...
	}

	$sql4567 = "SELECT * FROM `bookappointment` WHERE Date='$Date'";
	$result = mysqli_query($mysqli, $sql4567);

	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);

		if($Date == $row['Date']){
			echo 'Date & Time is already booked.';
		}
	}


	if (count($errors) == 0) {

		$sql = "INSERT INTO `bookappointment` (`Pname`, `Date`, `Test`, `Address`, `ContactNo`, `Email`) VALUES ('$Pname','$Date','$Test','$Address','$Contact','$Email') ";

		if ($mysqli->query($sql)) {
			$done = 45;
			
		} elseif (!$mysqli->query($sql)) {
			printf("%d Can't Book At The Moment.\n", $mysqli->affected_rows);
		}
		$_SESSION['AppoID'] = $AppoID;
		$_SESSION['success'] = "you are now logged in";
		header('location:../public/index.php');
	}
}


if (isset($_POST['Book1'])) {

	$AppoID = 	$mysqli->real_escape_string($_POST['AppoID']);
	$Pname = 	$mysqli->real_escape_string($_POST['Pname']);
	$Date 	=	 $mysqli->real_escape_string($_POST['Date']);
	$Test 	= 	$mysqli->real_escape_string($_POST['test']);
	$Address 	= 	$mysqli->real_escape_string($_POST['Address']);
	$Contact 	= 	$mysqli->real_escape_string($_POST['Contact']);


	extract($_POST);
	if (empty($AppoID)) {
		array_push($errors, "Appointment ID is required");
	}

	if (empty($Pname)) {
		array_push($errors, "Patient Name is required");
	}

	if (empty($Date)) {
		array_push($errors, "Date & Time is required");
	
	}


	if (empty($Test)) {
		array_push($errors, "Test is required");
	
	}

	if (empty($Address)) {
		array_push($errors, "Address is required");
	
	}

	if (empty($Contact)) {
		array_push($errors, "Contact No. is required");
	}


	$sql4567 = "SELECT * FROM `bookappointment` WHERE Date=('$Date')";
	$result = mysqli_query($mysqli, $sql4567);

	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);

		if($Date==$row['Date']){ ?>
		<h2 class="thanks"> <?php printf("Date is Already booked.");?></h2>
			
			<?php
		}
	}





	if (count($errors) == 0) {

		$sql = "INSERT INTO `bookappointment` (`AppoID`, `Pname`, `Date`, `Test`, `Address`, `ContactNo`) VALUES ('$AppoID','$Pname','$Date','$Test','$Address','$Contact') ";

		if ($mysqli->query($sql)) { ?>
		    <h2 class="thanks"> <?php printf("Appointment Booked Successfully.");?></h2>
			$done=45;
			<?php
		} elseif (!$mysqli->query($sql)) {
			printf("%d Can't Book At The Moment.\n", $mysqli->affected_rows);
		}
		$_SESSION['AppoID'] = $AppoID;
		$_SESSION['success'] = "you are now logged in";
		header('location:book.php');
	}
}



if (isset($_POST['cancel'])) {

	$AppoID2 = $mysqli->real_escape_string($_POST['AppoID2']);

	if (empty($AppoID2)) {
		array_push($errors, "Appointment ID is required");
	}
	if (count($errors) == 0) {

		

		$query5 = "DELETE FROM bookAppointment WHERE AppoID='$AppoID2' ";
		if ($mysqli->query($query5)) {

			if ($mysqli->affected_rows == 0) {
				array_push($errors, "Wrong Appointment ID");

			}
		} else {
			$errors[] = 'The Appointment is Cancled.';
		}
	}
}


if (isset($_POST['Add'])) {

	$addID 				= $mysqli->real_escape_string($_POST['addID']);
	$addname 			= $mysqli->real_escape_string($_POST['addname']);
	$addAddress 		= $mysqli->real_escape_string($_POST['addAddress']);
	$addContactNumber	= $mysqli->real_escape_string($_POST['addContactNumber']);
	$addEmail 			= $mysqli->real_escape_string($_POST['addEmail']);
	$addPassword 		= $mysqli->real_escape_string($_POST['addpassword']);





	if (empty($addID)) {
		array_push($errors, "ID is required");
		# code...
	}

	if (empty($addname)) {
		array_push($errors, "Name is required");
		# code...
	}


	if (empty($addAddress)) {
		array_push($errors, "Address is required");
		# code...
	}

	if (empty($addContactNumber)) {
		array_push($errors, "Contact Number is required");
		# code...
	}


	if (empty($addEmail)) {
		array_push($errors, "Email is required");
		# code...
	}

	if (empty($addPassword)) {
		array_push($errors, "Password is required");
		# code...
	}



	if (count($errors) == 0) {


		$sql5 = "INSERT INTO `staff` (`StaffID`, `Staff Name`, `email`, `Address`, `ContactNumber`, `password`) VALUES ('$addID','$addname','$addEmail','$addAddress','$addContactNumber','$addPassword')";
		$shri = $mysqli->query($sql5);

		if ($sql5) {
			$errors[] = 'Member is Added';
		}



		$_SESSION['addID'] = $addID;
		$_SESSION['success'] = "you are now logged in";
		header('location:add.php');
	}
}



if (isset($_POST['Delete'])) {

	$deleteID = $mysqli->real_escape_string($_POST['deleteID']);

	if (empty($deleteID)) {
		array_push($errors, "Member ID is required");
	}
	if (count($errors) == 0) {





		$querydelete = "DELETE FROM staff WHERE StaffID='$deleteID' ";
		if ($mysqli->query($querydelete)) {

			if ($mysqli->affected_rows == 0) {
				array_push($errors, "Wrong Staff ID");

				# code...
			}
		} else {

			echo 'Staff is Removed.';
		}
	}
}



?>