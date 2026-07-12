<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Bike Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.hero-index{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #000;
            font-family: Arial, sans-serif;
        }

        /* Main area with background image */
        .hero-wrapper{
            flex: 1;
            background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.60)),
                        url('BIKE/ccar.jpg') center center/cover no-repeat;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .site-navbar{
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(4px);
            padding: 10px 20px;
        }

        .site-navbar .navbar-brand img{
            width: 180px;
        }

        .site-navbar .nav-link{
            color: #fff;
            font-weight: 600;
            margin-left: 15px;
            transition: 0.3s;
        }

        .site-navbar .nav-link:hover{
            color: #ff2b2b;
        }

        .navbar-toggler{
            border: 1px solid #fff;
        }

        .navbar-toggler:focus{
            box-shadow: none;
        }

        .navbar-toggler-icon{
            filter: invert(1);
        }

        /* Message box */
        .msg-box h2{
            font-size: 18px;
            color: #00ff88;
            margin: 0;
        }

        /* Hero center section */
        .hero-section{
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        .hero-title{
            color: #fff;
            font-size: 50px;
            font-weight: 700;
            line-height: 1.4;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
        }

        .hero-title span{
            color: #ff2b2b;
        }

        /* Footer */
        .site-footer{
            background-color: #111;
            color: #fff;
            padding: 40px 20px 20px;
            margin-top: auto;
        }

        .site-footer h5{
            color: #ff3b3b;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .site-footer p,
        .site-footer a{
            color: #ddd;
            text-decoration: none;
            margin-bottom: 8px;
            display: block;
            font-size: 15px;
        }

        .site-footer a:hover{
            color: #fff;
        }

        .footer-bottom{
            border-top: 1px solid rgba(255,255,255,0.15);
            margin-top: -250px;
            padding-top: 1px;
            text-align: center;
            font-size: 14px;
            color: #bbb;
        }

        /* Responsive */
        @media (max-width: 991px){
            .site-navbar .nav-link{
                margin-left: 0;
                padding: 10px 0;
            }

            .msg-box{
                margin-top: 10px;
            }
        }

        @media (max-width: 768px){
            .hero-title{
                font-size: 34px;
            }

            .site-navbar .navbar-brand img{
                width: 140px;
            }
        }

        @media (max-width: 480px){
            .hero-title{
                font-size: 28px;
                line-height: 1.5;
            }
        }
    </style>
</head>
<body class="hero-index">

    <!-- Hero wrapper starts -->
    <div class="hero-wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg site-navbar">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="BIKE/Hero1.svg" alt="Hero Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bikes.php">Bikes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="3Dfotos.html">3D Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                    </ul>

                    <!-- Message box -->
                    <div class="msg-box ms-lg-3 mt-3 mt-lg-0">
                        <h2>
                            <?php
                            if(isset($_GET['Message'])){
                                echo $_GET['Message'];
                            }
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="hero-section">
            <div class="container">
                <h1 class="hero-title">
                    Ride With <span>Hero</span>...<br>
                    Pride in Every Ride,<br>
                    Adventure Awaits!
                </h1>
            </div>
        </main>

    </div>
    <!-- Hero wrapper ends -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <!-- About -->
                <div class="col-md-4 mb-4">
                    <h5>About Hero Bikes</h5>
                    <p>
                        Explore the best Hero bikes with powerful performance,
                        stylish design, and trusted quality for every ride.
                    </p>
                    <p>
                        Your journey starts here with Hero.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <a href="index.php">Home</a>
                    <a href="bikes.php">Bikes</a>
                    <a href="3Dfotos.html">3D Images</a>
                    <a href="aboutus.php">About Us</a>
                </div>

                <!-- Contact -->
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p>Email: info@herobikes.com</p>
                    <p>Phone: +91 XXXXX XXXXX</p>
                    <p>Rajkot, Gujarat, India</p>
                </div>

            </div>

            <div class="footer-bottom">
                &copy; 2025 - 2027 Hero Bike Showroom | All Rights Reserved
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> 