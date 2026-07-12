<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="hero-bike d-flex justify-content-center align-items-center">
  <div class="glass-card p-4" style="width: 350px;">
    <h2 class="text-center mb-4">Customer Registration</h2>
    <?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

    // Database connection settings
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "bike_db";

    // Initialize message variables
    $success_message = "";
    $error_message = "";

    // Check if bike_name and bike_price are set from GET parameters
    $bike_name = isset($_GET['bike_name']) ? trim($_GET['bike_name']) : '';
    $bike_price = isset($_GET['bike_price']) ? trim($_GET['bike_price']) : '';

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $customer_name = trim($_POST['customer_name']);
        $customer_email = trim($_POST['customer_email']);
        $bike_name = trim($_POST['bike_name']);
        $bike_price = trim($_POST['bike_price']);
        $booked_date = trim($_POST['booked_date']);

        // Get today's date in YYYY-MM-DD format
        $today = date('Y-m-d');

        // Validate input
        if (empty($customer_name) || empty($customer_email) || empty($bike_name) || empty($bike_price) || empty($booked_date)) {
            $error_message = "All fields are required.";
        } elseif ($booked_date !== $today) {
            $error_message = "Booking date must be today's date.";
        } else {
            // Create database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                $error_message = "Connection failed: " . $conn->connect_error;
            } else {
                // Prepare and execute SQL statement
                $stmt = $conn->prepare("INSERT INTO customer_bike (customer_name, customer_email, bike_name, bike_price, booked_date) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $customer_name, $customer_email, $bike_name, $bike_price, $booked_date);

                if ($stmt->execute()) {
                    // Include PHPMailer classes
                    require 'PHPMAILER/Exception.php';
                    require 'PHPMAILER/PHPMailer.php';
                    require 'PHPMAILER/SMTP.php';

                    // Create PHPMailer instance
                    $mail = new PHPMailer(true);

                    try {
                        // Server settings
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = '';//// ADD YOUR GMAIL ID HERE
                        $mail->Password = '';//// ADD YOUR GMAIL PASSWORD HERE
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;

                        // Recipients
                        $mail->setFrom('', 'Bike Booking System');  // ADD YOUR GMAIL ID HERE 
                        $mail->addAddress($customer_email, $customer_name);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Bike Booking Confirmation';
                        $mail->Body = "Congratulations Mr/Mrs. $customer_name, your $bike_name bike booking was successful at the price of $bike_price.";

                        $mail->send();
                        $success_message = "Registration successful! Confirmation email sent.";
                    } catch (Exception $e) {
                        $error_message = "Registration successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    $stmt->close();
                } else {
                    $error_message = "Error storing data: " . $conn->error;
                }

                $conn->close();
            }
        }
    }
    ?>
    <?php if ($success_message): ?>
      <p class="text-center text-white mt-2"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if ($error_message): ?>
      <p class="text-center mt-2" style="color:#ff4d4d;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <input type="text" class="form-control mb-3" placeholder="Customer Name" required name="customer_name">
      <input type="email" class="form-control mb-3" placeholder="Customer Email" required name="customer_email">
      <input type="text" class="form-control mb-3" placeholder="Bike Name" required name="bike_name" value="<?php echo htmlspecialchars($bike_name); ?>" readonly>
      <input type="number" class="form-control mb-3" placeholder="Bike Price" required name="bike_price" value="<?php echo htmlspecialchars($bike_price); ?>" readonly>
      <input type="date" class="form-control mb-3" placeholder="Booked Date" required name="booked_date" id="booked_date">
      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
  </div>

  <script>
    // Client-side validation for today's date
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
      const bookedDateInput = document.getElementById('booked_date');
      const bookedDate = bookedDateInput.value;
      const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

      if (bookedDate !== today) {
        event.preventDefault(); // Prevent form submission
        alert("Booking date must be today's date.");
        bookedDateInput.focus();
      }
    });

    // Set the default date to today and restrict date picker
    document.addEventListener('DOMContentLoaded', function() {
      const bookedDateInput = document.getElementById('booked_date');
      const today = new Date().toISOString().split('T')[0];
      bookedDateInput.value = today; // Set default value to today
      bookedDateInput.setAttribute('min', today); // Prevent selecting past dates
      bookedDateInput.setAttribute('max', today); // Prevent selecting future dates
    });
  </script>
</body>
</html>
