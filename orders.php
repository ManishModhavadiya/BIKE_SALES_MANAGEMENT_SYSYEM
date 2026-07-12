<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="hero-bike py-4">
    <a href="admin.php" class="back-btn">
      <img src="IMAGES/back02.svg" alt="Back">
    </a>
    <div class="container orders-wrapper p-4">
        <h1 class="text-center mb-4">Bike Bookings</h1>
        <?php
        // Database connection settings
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "bike_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to select all records from cars01 table
        $sql = "SELECT customer_id, customer_name, Customer_email, bike_price, Bike_name, Booked_Date FROM customer_bike";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output table
            echo "<div class='table-responsive'><table class='table table-striped table-hover align-middle'>";
            echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Email</th><th>Car Price</th><th>Car Name</th><th>Booked Date</th></tr>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["customer_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["customer_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Customer_email"]) . "</td>";
             echo "<td>₹" . number_format($row["bike_price"], 2) . "</td>";

                echo "<td>" . htmlspecialchars($row["Bike_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Booked_Date"]) . "</td>";
                echo "</tr>";
            }
            echo "</table></div>";
        } else {
            echo "<p class='text-center'>No records found.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
