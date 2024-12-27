<?php include('./datafield/server.php'); ?>
<!-- <?php include('./datafield/bookserver.php'); ?>
<?php include('./datafield/errors.php'); ?> -->


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
    <title>Shri Lab</title>
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style2.css">
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
        #profile{
            padding: 150px 100px;
            height: 100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        #profile .prof{
            height: 550px;
            border: 1px solid gray;
            border-radius: 10px;
        }
        .prof form{
            padding: 20px 0px 0px 0px;
            margin-left: 50px;
            
        }
        form button{
            align-items: center;
        }
        .img{
            background-color: #2ecc71;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .img img{
            height: 300px;
            width: 300px;
            border-radius: 50%;
            border: 2px solid black;

        }
        header {
            width: 100vw;
            height: 80px;
            position: fixed;
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
            margin: 0 15px;
            text-decoration: none;
        }
        h1 span {
            color: #2ecc71;
        }
       
        ul li a:hover{
            text-decoration: none;
        }
        /* Responsive Design */
        @media screen and (max-width: 1110px) {
            #profile .prof{
                width: 100%;
                height: auto;
                padding-bottom: 30px;
            }
            #profile{
                padding: 100px 0px 0px 0px;
            }
        }
            

        @media screen and (max-width: 480px) {
            #profile{
                padding: 100px 0px 0px 0px;
            }
            #profile .prof{
                width: 100%;
                height: auto;
                padding-bottom: 30px;
            }
            header .logo {
                margin-bottom: 10px;
            }
            header nav a {
                margin: 5px 0;
            }
        }
    </style>
    
</head>
<body>
    
    <header>
        <nav class="navbar navbar-expand-lg text-light">
            <div class="container-fluid">
                <h1 class="navbar-brand fs-1">Shri<span class="lab text-white">Laboratory</span></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link fs-5 fw-bold">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./profile.php" class="nav-link fs-5 fw-bold">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="./contact.php" class="nav-link fs-5 fw-bold">Contact Support</a>
                        </li>
                        <li class="nav-item">
                            <a href="./ulogin.php" class="nav-link fs-5 fw-bold">Logout</a>
                        </li>
                                                
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>


    <section id="profile">
        <div class="prof col-4 img">
        <img src="./images/blood.jpg">
        </div>
        <div class=" prof col-6 info">
            <h1 class="text-center mt-5 fw-bold text-success" >Your Information</h1>
            <form class="d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column">
                        <label class="fw-bold fs-5 mt-3">Username:</label>
                        <label class="mt-3"><?php echo $result['userName']; ?></label>
                    </div>

                    <div class="col-md-6 d-flex flex-column">
                        <label class="fw-bold fs-5 mt-3">Full Name:</label>
                        <label class="mt-3 fs-5"><?php echo $Name; ?></label>
                    </div>
                   
                    
                </div>
                <div class="row mt-5">

                    <div class="col-md-6 d-flex flex-column">
                        <label class="fw-bold fs-5 mt-3">Email Id:</label>
                        <label class="fs-5 mt-3"><?php echo $Email; ?></label>
                        
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        <label class="fw-bold fs-5 mt-3">Contact Number:</label>
                        <label class="mt-3 fs-5"><?php echo $ContactNumber; ?></label>
                    </div>
                    
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 d-flex flex-column">
                        <label class="fw-bold fs-5 mt-3">Address:</label>
                        <label class="mt-3 fs-5"><?php echo $Address; ?></label>
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        <a href="./edit.php" class="btn btn-warning w-50 mt-5 fw-bold text-decoration-none">
                            Edit
                        </a>
                    </div>
                </div>
               
                
            </form>
        </div>
    </section>
    
</body>
<script>
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
</script>
</html>