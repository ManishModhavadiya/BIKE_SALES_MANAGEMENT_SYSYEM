<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="hero-bike d-flex justify-content-center align-items-center position-relative">

   <a href="admin.php" class="back-btn">
      <img src="IMAGES/back02.svg" alt="Back">
    </a>

  <div class="glass-card p-4 text-center" style="width: 350px;">
  <img src="IMAGES/add.png" alt="Bike Icon" style="width: 80px; height: 80px;" class="mb-3">
    <h2 class="mb-4">Bike Registration</h2>
    <?php
   
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "bike_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checking the  connection
    if ($conn->connect_error) {
        die("<p class='text-danger'>Connection failed: " . $conn->connect_error . "</p>");
    }

    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bike_id = $_POST['bike_id'];
        $bike_name = $_POST['bike_name'];
        $bike_image = $_POST['bike_image'];
        $bike_price = $_POST['bike_price'];
        $bike_details = $_POST['bike_details'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO bike_table (bike_id, bike_name, bike_image, bike_price, bike_details) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $bike_id, $bike_name, $bike_image, $bike_price, $bike_details);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Bike registered successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <input type="text" class="form-control mb-3" placeholder="Bike ID" 
       name="bike_id">
      <input type="text" class="form-control mb-3" placeholder="Bike Name" required name="bike_name">
      <input type="file" class="form-control mb-3" placeholder="Bike Image Path" required name="bike_image" accept=".jpg,.jpeg,.png">
      <input type="text" class="form-control mb-3" placeholder="Bike Price" required name="bike_price" pattern="[0-9]{5,6}">
      <textarea class="form-control mb-3" placeholder="Bike Details" required name="bike_details" rows="4"></textarea>
      <button type="submit" class="btn btn-success w-100">Add  Bike</button>
    </form>
    <?php if ($message): ?>
      <p class="mt-3"><?php echo $message; ?></p>
       <?php if ($message === "Bike registered successfully!"): ?>
            <audio id="successAudio11" src="IMAGES/newbike.mp3" autoplay></audio>
            <script>
                // Play audio to bypass browser autoplay restrictions
                document.addEventListener('DOMContentLoaded', function() {
                    var audio = document.getElementById('successAudio11');
                    audio.play().catch(function(error) {
                        console.log("Autoplay prevented: ", error);
                    });
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
  </div>
  <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const fileInput = document.querySelector('input[name="bike_image"]');
            const file = fileInput.files[0];
            
            if (file) {
                const validExtensions = ['jpg', 'jpeg','png'];
                const fileExtension = file.name.split('.').pop().toLowerCase();
                
                if (!validExtensions.includes(fileExtension)) {
                    e.preventDefault();
                    alert('Only JPG, JPEG, and PNG files are allowed!');
                }
            } else {
                e.preventDefault();
                alert('Please select a JPG, JPEG, or PNG file!');
            }
        });
    </script>

</body>
</html>
