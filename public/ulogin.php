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
			height: 70vh;
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
	<form action="ulogin.php" method="post" class="align-items-center">

	<?php
if(isset($_GET['loginerror'])){
	$loginerror=$_GET['loginerror'];
}

if(!empty($loginerror)){
	echo '<P class="error">Invalid Login credentials, Please try Again..</p>';
}
 ?>
	<?php include ('./datafield/errors.php')?>
		<h1 class="header text-center">User Login</h1>
		<dl>
			<dt class="mt-5">Username or Email</dt>
			<dd><input type="text" value="<?php if(!empty($loginerror)){ echo $loginerror;} ?>" name="userEmail" class="form-control"></dd>
			<dt class="mt-4">Password</dt>
			<dd><input type="Password" name="password" class="form-control mb-3"></dd>

			<dt><button type="submit" class="btn btn-success w-100 mb-3 mt-4" name="Login">Login</button></dt>

			<dt class="text-center mt-4">Not a Member? <a href="./usignup.php" class="text-decoration-none mb-3">Sign Up</a></dt>
		</dl>
	</form>
</body>
</html>