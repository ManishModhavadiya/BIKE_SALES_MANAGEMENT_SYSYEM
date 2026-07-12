<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Car</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="hero-bike d-flex justify-content-center align-items-center position-relative">
  <a href="admin.php" class="back-btn">
      <img src="IMAGES/back02.svg" alt="Back">
  </a>

  <div class="glass-card p-4 text-center" style="width: 350px;">
      <img src="IMAGES/delete.png" alt="bike Icon" style="width: 80px; height: 80px;" class="mb-3">

    <h2 class="mb-4" style="color:#e04343;">DELETE BIKE</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bike_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<p class='text-danger'>Connection failed: " . $conn->connect_error . "</p>");
    }

    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bike_id = $_POST['bike_id'];

        // Prepare and bind
        $stmt = $conn->prepare("DELETE FROM bike_table WHERE bike_id = ?");
        $stmt->bind_param("i", $bike_id);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Bike deleted successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Fetch bike names from database
    $sql = "SELECT bike_id, bike_name FROM bike_table";
    $result = $conn->query($sql);

    $conn->close();
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <select name="bike_id" required class="form-select mb-3">
        <option value="" disabled selected>Select Bike</option>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['bike_id'] . "'>" . $row['bike_name'] . "</option>";
            }
        } else {
            echo "<option value='' disabled>No bikes found</option>";
        }
        ?>
      </select>
      <button type="submit" class="btn btn-danger w-100">Delete Bike</button>
    </form>
    <?php if ($message): ?>
      <p class="mt-3"><?php echo $message; ?></p>
       <?php if ($message === "Bike deleted successfully!"): ?>
            <audio id="successAudio3" src="IMAGES/cardelete.mp3" autoplay></audio>
            <script>
                // Play audio to bypass browser autoplay restrictions
                document.addEventListener('DOMContentLoaded', function() {
                    var audio = document.getElementById('successAudio3');
                    audio.play().catch(function(error) {
                        console.log("Autoplay prevented: ", error);
                    });
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
  </div>
</body>
</html>
