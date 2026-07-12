<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('BIKE/ccar.jpg'); background-repeat: no-repeat; background-size: cover;background-attachment: fixed;">

    <div class="header">
        <nav class="navbar navbar-expand-lg site-navbar">
            <div class="container-fluid">
                                <img src="BIKE/Hero1.svg" alt="logo" style="height:96px;width:120px;">

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="bikes.php">Bikes</a></li>
                        <li class="nav-item"><a class="nav-link" href="3Dfotos.html">3DImages</a></li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.php">About us</a></li>

                    </ul>
                </div>

                <!-- Admin login logout msg  -->
                <div class="msg-box ms-3">
                    <h2>
                    <?php
                    if(isset($_GET['Message'])){
                        echo $_GET['Message'];
                    }
                    ?>
                    </h2>
                </div>
            </div>
        </nav>

        <div class="container py-3">
            <img src="IMAGES/map.png" height="80" width="70" class="mb-4">

            <!-- Four Buttons -->
            <div class="d-flex flex-wrap gap-3">
<input type="button" class="btn btn-warning fw-bold" style="width:150px;height:50px;" value="HERO" 
onclick="window.open();//add ur nearest hero showroom link here" />
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="site-footer text-center py-5 mt-5">
        <div class="features">
            <h3 class="text-warning mb-4">Key Features :</h3>
            <ul class="list-unstyled mx-auto" style="max-width:500px; text-align:left;">
                <li class="mb-2 ps-4 position-relative"><span class="position-absolute start-0 text-warning">✔</span>Customer buys Bikes and gets email confirmation</li>
                <li class="mb-2 ps-4 position-relative"><span class="position-absolute start-0 text-warning">✔</span>Wide Range of Bikes</li>
                <li class="mb-2 ps-4 position-relative"><span class="position-absolute start-0 text-warning">✔</span>Add, Update and Remove Bike</li>
                <li class="mb-2 ps-4 position-relative"><span class="position-absolute start-0 text-warning">✔</span>Trusted Dealers</li>
                <li class="mb-2 ps-4 position-relative"><span class="position-absolute start-0 text-warning">✔</span>24/7 Customer Support</li>
            </ul>
        </div>
        <div class="mt-4" style="color:#ccc;">
            Developed by <b>Hero Bike Sales Corporation</b>
        </div>
    </div>
</body>
</html>
