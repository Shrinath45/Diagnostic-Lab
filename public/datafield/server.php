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



	$userName	= $mysqli->real_escape_string($_POST['userName']);
	$Name 	= $mysqli->real_escape_string($_POST['Name']);
	$Address 	= $mysqli->real_escape_string($_POST['Address']);
	$ContactNumber	 = $mysqli->real_escape_string($_POST['ContactNumber']);
	$Email 		=  $mysqli->real_escape_string($_POST['Email']);
	$Password 	= $mysqli->real_escape_string($_POST['password']);


    extract($_POST);
	if(strlen($userName)<3){
		$errors[]= ' Please Enter your userName';
	}

	if(strlen($userName)>20){
		$errors[]= ' Max length of userName 20 characters not allowed';
	}
	if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $userName))
	{
		$errors[]= 'Invalid userName. Enter lowercase letters without any space and no number at the start.';
	}


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
	if(!preg_match("/^[0-9]*$/", $ContactNumber))
	{
		$errors[]= 'Invalid Contact Number. please enter Digits without any letter or Special Symbol.';
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

	$sql4567 = "SELECT * FROM `user` WHERE (userName='$userName' or Email='$Email' or Name='$Name')";
	$result = mysqli_query($mysqli, $sql4567);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);

		if($userName==$row['userName']){
			$errors[] = 'Username already exists.';
		}
		if($Email==$row['Email']){
			$errors[] = 'Email already exists.';
		}
	}

	if (count($errors) == 0) {


		$Password = md5($Password);

		$sql = "INSERT INTO `user` (`userName`, `Name`, `Address`, `ContactNumber`, `Email`, `Password`) VALUES ('$userName','$Name','$Address','$ContactNumber','$Email','$Password')";




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

	$userEmail 	= $mysqli->real_escape_string($_POST['userEmail']);
	$Password 	= $mysqli->real_escape_string($_POST['password']);
	if (empty($userEmail)) {
		array_push($errors, "userName is required");
		# code...
	}
	if (empty($Password)) {
		array_push($errors, "Password is required");


		# code...
	}


	if (count($errors) == 0) {

		$Password = md5($Password);



		$query = "SELECT * FROM `user` WHERE userName=('$userEmail') OR Email=('$userEmail') AND Password=('$Password')";
		$result = mysqli_query($mysqli, $query);
		$numRows = mysqli_num_rows($result);
		if ($numRows == 1) {

            $row = mysqli_fetch_assoc($result);
			$_SESSION['login_sess']="1";
			$_SESSION['login_Name']=$row['Name'];
			header('location:./index.php');
          
		} else{
            header("location: Ulogin.php?loginerror=".$userEmail);
        }
	}
}


# code...


if (isset($_GET['logout'])) {

	session_destroy();
	usset($_SESSION['userName']);
	header('location:../public/ulogin.php');
}


if (isset($_GET['My info'])) {
	header('location:login.php');
}

$userprofile =isset($_SESSION['Name']);
$query = "SELECT * FROM user WHERE Name=('$userprofile')";
$result = mysqli_query($mysqli, $query);
$col = mysqli_fetch_assoc($result);


////// STAFF LOGIN ///////////


if (isset($_POST['Login2'])) {

	$Mpassword = $mysqli->real_escape_string($_POST['Mpassword']);
	$staffId	= $mysqli->real_escape_string($_POST['staffEmail']);
	if (empty($staffId)) {
		array_push($errors, "ID or Email is required");
		# code...
	}
	if (empty($Mpassword)) {
		array_push($errors, "Password is required");


		# code...
	}


	if (count($errors) == 0) {

		$queryD = "SELECT * FROM `staff` WHERE StaffID=('$staffId') OR email=('$staffId') AND password=('$Mpassword')";
		$resultD = mysqli_query($mysqli, $queryD);
		$shri = mysqli_num_rows($resultD);
		if ($shri == 1) {
	
		    $row = mysqli_fetch_assoc($resultD);
		    $_SESSION['login_ses']="1";
		    $_SESSION['login_email']=$row['email'];
			// $_SESSION['StaffId'] = $staffId;
			// $_SESSION['success'] = "you are now logged in";
			header('location:./index2.php');
		} else {
			array_push($errors, "The Email/Password not correct");
		}
	}
}



if (isset($_GET['logout'])) {

	session_destroy();
	usset($_SESSION['UserID']);
	header('location:login.php');
}






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
				header('location:../presentaionfield/admin/home.php');
			} else {
				array_push($errors, "The ID/Password not correct");
			}
		}
	}




// Feedback PHP Code //
 


if (isset($_POST['sendfeedback'])) {
 
$feed1	= $mysqli->real_escape_string($_POST['AppoID3']);
$feed2	= $mysqli->real_escape_string($_POST['Pname3']);
$feed3	= $mysqli->real_escape_string($_POST['feedx']);

if (empty($feed1)) {
	array_push($errors, "Appointment ID is rewquired.");
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

	
	$sqlll = "SELECT * FROM `bookappointment` WHERE Pname='$feed2' AND AppoID='$feed1' ";
	$resultl = mysqli_query($mysqli, $sqlll);
	$numRows = mysqli_num_rows($resultl);

	if($numRows == 1){
		$sqlfeed = "INSERT INTO `PFeedback` (`Pid`, `Pname`, `feedback`) VALUES ('$feed1', '$feed2', '$feed3') ";

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



if (isset($_POST['Book'])) {

	$Pname = 	$mysqli->real_escape_string($_POST['Pname']);
	$Date 	=	 $mysqli->real_escape_string($_POST['Date']);
	$Test 	= 	$mysqli->real_escape_string($_POST['test']);
	$Address 	= 	$mysqli->real_escape_string($_POST['Address']);
	$Contact 	= 	$mysqli->real_escape_string($_POST['Contact']);
	$Email 	= 	$mysqli->real_escape_string($_POST['Email']);

	extract($_POST);
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

	$AppoID = $_POST['AppoID'];
	$sql = "UPDATE appointments SET status='Cancelled' WHERE AppointmentID='$AppoID'";


	if ($mysqli->query($sql) === TRUE) {
        echo "Appointment cancelled successfully.";
    } else {
        echo "Error cancelling appointment: " . $mysqli->error;
    }
}
$sql = "SELECT * FROM bookappointment WHERE Pname='shrinath adhav'"; // Example query to fetch appointments
$result = $mysqli->query($sql);

// Fetch appointments from the database

	

	// $AppoID2 = $mysqli->real_escape_string($_POST['AppoID2']);

	// if (empty($AppoID2)) {
	// 	array_push($errors, "Appointment ID is required");
	// }
	// if (count($errors) == 0) {

	// 	$query5 = "DELETE FROM bookAppointment WHERE AppoID='$AppoID2' ";
	// 	if ($mysqli->query($query5)) {

	// 		if ($mysqli->affected_rows == 0) {
	// 			array_push($errors, "Wrong Appointment ID");

	// 		}
	// 	} else {
	// 		$errors[] = 'The Appointment is Cancled.';
	// 	}
	// }



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