
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
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ensure the body takes full viewport height */
            margin: 0;
        }
        form {
            border: 1px solid gray;
            padding: 50px;
            width: 500px;
            border-radius: 10px;
            background-color: gray;
        }
        @media screen and (max-width: 667px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <form action="ulogin.php" method="post">
        <h1 class="text-center">User Login</h1>

        <!-- Display errors from errors.php -->
        <?php include('./datafield/errors.php'); ?>

        <!-- Display loginerror if set -->
        <?php
        if (isset($_GET['loginerror']) && !empty($_GET['loginerror'])) {
            $loginerror = htmlspecialchars($_GET['loginerror'], ENT_QUOTES, 'UTF-8');
            echo '<p class="text-danger text-center">Invalid login credentials, please try again.</p>';
        }
        ?>

        <dl>
            <dt class="mt-5">UserID or Email</dt>
            <dd><input type="text" name="userEmail" class="form-control" placeholder="Enter your User ID or Email" required></dd>

            <dt class="mt-4">Password</dt>
            <dd><input type="password" name="password" class="form-control mb-3" placeholder="Enter your Password" required></dd>

            <dt><button type="submit" class="btn btn-success w-100 mb-3 mt-4" name="Login">Login</button></dt>

            <dt class="text-center mt-4">Not a Member? <a href="./usignup.php" class="text-decoration-none mb-3">Sign Up</a></dt>
        </dl>
    </form>
</body>
</html>
