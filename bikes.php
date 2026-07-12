<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "bike_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all cars from cars02 table
    $stmt = $conn->prepare("SELECT bike_name, bike_image, bike_price, bike_details FROM bike_table");
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<html>

<head>
    <title>Bikes</title>
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
            </div>
        </nav>

        <!-- message when user by car -->
        <div class="msg-box">
            <h3></h3>
        </div>
    </div>

    <div id="display" class="container py-4">
        <div class="row g-4">
            <?php foreach ($cars as $car): ?>
                <div class="col-md-6">
                    <div class="bike-card card p-3 h-100">

                        <h1 class="h5"><span class="text-danger">BIKE NAME : </span><span class="detail"><?php echo htmlspecialchars($car['bike_name']); ?></span></h1>
                        <div class="carimg mb-2"><img src="BIKE/<?php echo htmlspecialchars($car['bike_image']); ?>" alt="Bike Image" class="img-fluid rounded"></div>
                        <h1 class="h4">BIKE PRICE : <span class="detail"><?php echo htmlspecialchars('₹' . number_format($car['bike_price'], 0, '.', ',')); ?></span></h1>
                        <h1 class="h4">BIKE Details :</h1>
                        <p class="bike-desc"><?php echo htmlspecialchars($car['bike_details']); ?></p>

                        <form action="Register.php" method="GET">
                            <input type="hidden" name="bike_name" value="<?php echo htmlspecialchars($car['bike_name']); ?>">
                            <input type="hidden" name="bike_price" value="<?php echo htmlspecialchars($car['bike_price']); ?>">
                            <input type="button" class="btn btn-warning fw-bold mt-2" onclick="window.location.href='Register.php?bike_name=<?php echo urlencode($car['bike_name']); ?>&bike_price=<?php echo urlencode($car['bike_price']); ?>'" value="BUY NOW">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- footer start -->
    <hr class="border-light">
    <div class="site-footer py-4">
        <footer class="container" style="font-size:20px;">
            <div class="row">
                <div class="col-md-6">
                    <p><b>Sell your bikes in our website <br> Contact us : modhaw*********@gmail.com</b></p>
                    <p>&copy 2025-2027 @HeroMotors.com</p>
                    <p>Thank you for visiting Hero Bike Sales </p>
                </div>
                <div class="col-md-6">
                    <p><b>Also visit these websites :</b></p>
                    <a href="https://www.HeroMotoCorps.com/" target="_blank">Hero MotoCorps</a><br>
                    <a href="https://www.BikeWale.com/" target="_blank">BikeWale</a><br>
                    <a href="https://www.BikeDekho.com/" target="_blank">BikeDekho</a><br>
                    <a href="https://www.autox.com/" target="_blank">BikeDekho</a><br>
                  
                </div>
            </div>
            <div class="admin">
                <!-- <a href="login.php" target="_self">Are you admin?</a> -->
            </div>
        </footer>
    </div>
</body>

</html>