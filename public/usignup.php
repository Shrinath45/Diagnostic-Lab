<?php include('./datafield/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Panel</title>
	<link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<style>
		body {
			background-color: black;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			height: 100vh; /* Ensure the body takes full viewport height */
			margin: 0;
		}
		form{
			border: 1px solid gray;
			padding: 50px;
			width: 500px;
			border-radius: 10px;
			background-color: gray;
		}

		@media screen and (max-width:667px) {
			form{
				width: 100%;
			}
		}
	</style>
</head>
<body>

<form method="post" action="usignup.php" enctype="multipart/form-data" class="align-items-center">

   <?php if(isset($done)){ ?>
	<div class="successmsg"><span style="font-size: 100px;">&#9989;</span><br>
	You have Registered Succesfully. <br> <a href="./ulogin.php" style="color: black;">Login here...</a>
</div>
<?php } else { ?>

	<?php include ('./datafield/errors.php'); ?>

    <h1 class="header text-center">User Registration</h1>
		<dl>
			<dt class="mt-3">Username</dt>
			<dd><input type="text" name="userName" class="form-control" value="<?php if(isset($error)) { echo $userName;}  ?>" required ></dd>
            <dt class="mt-3">Full Name</dt>
            <dd><input type="text" name="Name" class="form-control" value="<?php if(isset($error)) { echo $Name;}  ?>" required ></dd>
            <dt class="mt-3">Address</dt>
            <dd><input type="text" name="Address" class="form-control" value="<?php if(isset($error)) { echo $Address;}  ?>" required></dd>
            <dt class="mt-3">Contact Number</dt>
            <dd><input type="text" name="ContactNumber" class="form-control" value="<?php if(isset($error)) { echo $ContactNumber;}  ?>" required></dd>
            <dt class="mt-3">Email</dt>
            <dd><input type="text" name="Email" class="form-control" value="<?php if(isset($error)) { echo $Email;}  ?>" required></dd>
			<dt class="mt-3">Password</dt>
			<dd><input type="text" name="password" class="form-control" value="<?php if(isset($error)) { echo $Password;}  ?>" required></dd>
			<dt class="mt-3">Confirm Password</dt>
			<dd><input type="text" name="password" class="form-control" value="<?php if(isset($error)) { echo $Password;}  ?>" required></dd>

			<dt><button type="submit" name="Register" class="btn btn-success w-100 mb-3 mt-4">Register</button></dt>

			<dt class="text-center mt-3">Already have a Account <a href="./ulogin.php" class="text-decoration-none mb-3">Sign In</a></dt>
		</dl>
<?php } ?>
</form>

</body>
</html>