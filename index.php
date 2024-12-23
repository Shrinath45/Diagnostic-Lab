<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>

        function toggleMenu(){
            document.getElementById("subMenu").classList.toggle("open-menu");
        }


        function Book(){
            alert("You have to Login first...");
        }
    </script>
    <style>
        body{
            font-family: Arial;
            background-image: url(./public/images/slide-1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        header{
            background-color: gray;
            height: 100px;
            width: 100vw;
            position: fixed;
        }
        .nav-link{
            margin-right: 10px;
            color: #000;
        }
        .nav-link:hover{
            color: aqua;
        }
        #btn{
            font-weight: bold;
            font-size: 18px;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
            margin-left: 30px;
            background-color: darkgray;
        }
        #btn:hover{
            background-color: aqua;
            color: black;
        }
        .lab{
            color: aqua;
        }
        .title{
            font-size: 50px;
        }
        .ul{
            margin-left: 800px;
            margin-top: 0px;
        }
        #red{
            cursor: pointer;
        }
        .carousel-item img{
            height: 600px;
        }
        #home{
            height: 100vh;
        }
        #home div{
            padding-top: 300px;
        }
        #about{
            height: 100vh;
            background-color: #F0F4F8;
        }
        #about h1{
            padding-top: 80px;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            color: aqua;
            text-decoration: underline;
        }
        #about p{
            margin-top: 50px;
            font-size: 30px;
            font-family: Arial;
            font-weight: bold;
            text-align: center;
        }
        #about p span{
            color: red;
            font-weight: bold;
            text-decoration: underline;
        }
        #services{
            height: 400px;
            background-color: black;
        }
        #services h1{
            padding-top: 150px;
            margin-bottom: 30px;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            color: aqua;
            text-decoration: underline;
        }
        .sub-menu-wrap{
            position: absolute;
            top: 60%;
            border-radius: 5px;
            text-align: center;
            right: 2%;
            width: auto;
            max-height: 0px;
            overflow: hidden;
            transition: max-height 0.5s; 
            z-index: 10;  
        }
        .sub-menu-wrap.open-menu{
            max-height: 400px;
        }
        .sub-menu{
            background-color: #000;
            color: white;
        padding: 20px;
        margin: 10px;
        border: 1px solid gray;
        }
        .sub-menu-link{
            display: flex;

            align-items: center;
            text-decoration: none;
            color: white;
            padding: 1px;
            
        }
        .sub-menu-link:hover{
            background-color: rgba(0,0,0,0.1);
            font-weight: bold;
        }
        .sub-menu-link p{
            width: 100%;
        }
        .sub-menu-link span{
            margin-top: -15px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg text-light d-flex flex-wrap">
            <div class="container-fluid">
                <h1 class="title navbar-brand">Shri<span class="lab">Lab</span></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="d-flex p-4 navbar-nav me-auto mb-2 mb-lg-0 ul">
                        <li class="nav-item">
                            <a href="#" class="nav-link fs-5" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link fs-5">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a href="#services" class="nav-link fs-5">Our Services</a>
                        </li>

                        <li class="bi bi-box-arrow-in-right nav-item nav-link fs-5" id="red" onclick="toggleMenu()"> Signin<span class="bi bi-arrow-down-short"></span></li>

                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <a href="./public/ulogin.php" class="sub-menu-link">
                                    <span class="bi bi-box-arrow-in-right"></span>
                                    <p>Sign in</p>
                                </a>
                                <a href="./public/usignup.php" class="sub-menu-link">
                                    <span class="bi bi-person-fill-add"></span>
                                    <p>Sign Up</p>
                                </a>
                        </div>
                        
</ul>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <main id="home">
            <div class="container">
                <h1 style="font-size: 45px; color: green; font-weight: bold;">Welcome to Our Diagnostic Laboratory</h1>
                <p style="font-size: 30px; color: red; font-weight: bold;">Your Health, Our Priority – Reliable Testing at Your Convenience</p>
                <button onclick="Book()" class="btn btn-primary fs-6 fw-bold p-3">Book Appointment</button>
            </div>

        </main>

        <main id="about">
            <h1>About Us</h1>
            <p>Welcome to <span>Shri Laboratory</span>, your trusted partner in health diagnostics. With a commitment to accuracy, reliability, and compassionate care, we have built our reputation as a leading diagnostic center dedicated to improving the health and well-being of our community.</p>
            <div>
                <button data-bs-target="#q1" data-bs-toggle="collapse" class="btn btn-dark w-100">Our Mission</button>
            <div class="collapse text-center m-2" id="q1">
                <span class="text-center" style="text-align: center; font-size: 18px; color: green; font-weight: bold;">At <span style="color: red; text-decoration: underline; font-weight: bold;">Shri Laboratory</span>, our mission is to provide accurate, timely, and affordable diagnostic services to help individuals and healthcare providers make informed decisions about their health. We are dedicated to maintaining the highest standards of quality, ensuring that every test result is backed by advanced technology and expert analysis.</span>
            </div>
            </div>
            <div>
                <button data-bs-target="#q2" data-bs-toggle="collapse" class="btn btn-dark w-100 mt-3">Our Vision</button>
            <div class="collapse text-center m-2" id="q2">
                <span class="text-center" style="text-align: center; font-size: 18px; color: green; font-weight: bold;">We envision a future where diagnostic excellence empowers people to lead healthier lives. Through innovation, precision, and a patient-first approach, we strive to be at the forefront of diagnostic advancements, providing seamless services that contribute to the overall well-being of our community.</span>
            </div>
            </div>
            <div>
                <button data-bs-target="#q3" data-bs-toggle="collapse" class="btn btn-dark w-100 mt-3">Why Choose Us?</button>
            <div class="collapse text-center m-2" id="q3">
                <span class="text-center mt-1" style="text-align: center; font-size: 18px; color: black; font-weight: bold;"><span style="color: green; font-weight: bold;">Experienced Team: </span>Our team of highly trained pathologists, radiologists, and lab technicians work together to offer unparalleled expertise and care.</span><br>
                <span class="text-center mt-1" style="text-align: center; font-size: 18px; color: black; font-weight: bold;"><span style="color: green; font-weight: bold;">Comprehensive Services: </span>From routine blood tests to advanced imaging and specialized pathology, we offer a full range of diagnostic services under one roof.</span><br>
                <span class="text-center mt-1" style="text-align: center; font-size: 18px; color: black; font-weight: bold;"><span style="color: green; font-weight: bold;">Fast and Reliable Results: </span>We understand that waiting for test results can be stressful. That’s why we focus on providing fast, reliable results without compromising quality..</span><br>
                <span class="text-center mt-1" style="text-align: center; font-size: 18px; color: black; font-weight: bold;"><span style="color: green; font-weight: bold;">Patient-Centric Care: </span>At <span style="color: red; text-decoration: underline; font-weight: bold;">Shri Laboratory</span>, patients come first. We prioritize your comfort and convenience by offering home sample collection services, online result access, and personalized customer care.</span>
            </div>
            </div>
        </main>
 
 
        <main id="services">
            <h1>Our Services</h1>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                  <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./public/images/ct scan.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1">CT Scan</h5>
                      <p  style="color: aqua;"class="fw-bold fs-3 ">Our CT Scan sservices provide advanced, high-resolution imaging to ensure accurate diagnosis and treatment planning with minimal discomfort.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/mri.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1 ">MRI Scan</h5>
                      <p style="color: aqua;" class="fw-bold fs-3 ">Providing clear, detailed images of soft tissues and organs for accurate diagnosis without radiation</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/blood.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1 ">Blood Test</h5>
                      <p style="color: aqua;" class="fw-bold fs-3 ">Comprehensive testing for accurate diagnosis and monitoring of various health conditions.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/electro.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1 ">ECG Test</h5>
                      <p style="color: aqua;" class="fw-bold fs-3 ">Measures heart’s electrical activity to detect and monitor heart conditions.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/electroence.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1 ">EEG Test</h5>
                      <p style="color: aqua;" class="fw-bold fs-3 "> Monitors brain activity to diagnose and manage neurological disorders.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/ultra.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1">Ultrasound Test</h5>
                      <p style="color: aqua;" class="fw-bold fs-3">Non-invasive imaging to assess internal organs, tissues, and monitor pregnancy.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./public/images/xray.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 style="color: red;" class="fw-bold fs-1">X-Ray Test</h5>
                      <p style="color: aqua;" class="fw-bold fs-3">Quick and painless imaging to detect fractures, infections, and monitor various conditions.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="text-black fw-bold fs-5">Previous</span>
                    <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next text-black" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon text-black" aria-hidden="true"></span>
                  <span class="text-black fw-bold fs-5">Next</span>
                </button>
              </div>
        </main>

    </section>
</body>

</html>