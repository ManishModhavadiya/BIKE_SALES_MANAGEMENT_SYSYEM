<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car UPDATE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="hero-bike d-flex justify-content-center align-items-center position-relative">
  <?php
// Initialize error message
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate file upload
    if (isset($_FILES['bike_image']) && $_FILES['bike_image']['error'] != UPLOAD_ERR_NO_FILE) {
        $allowed_extensions = ['jpg', 'jpeg'];
        $file_extension = strtolower(pathinfo($_FILES['bike_image']['name'], PATHINFO_EXTENSION));
        
        // Check if file extension is allowed
        if (!in_array($file_extension, $allowed_extensions)) {
            $error = "Only JPG and JPEG files are allowed.";
        }
    } else {
        $error = "Please select a JPG or JPEG file.";
    }
}
?>

   <a href="admin.php" class="back-btn">
      <img src="IMAGES/back02.svg" alt="Back">
    </a>

  <div class="glass-card p-4 text-center" style="width: 350px;">
      <img src="IMAGES/UPDATE.png" alt="Car Icon" style="width: 80px; height: 80px;" class="mb-3">

    <h2 class="mb-4">UPDATE CAR</h2>
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
        $bike_name = $_POST['bike_name'];
        $bike_image = $_POST['bike_image'];
        $bike_price = $_POST['bike_price'];
        $bike_details = $_POST['bike_details'];

        // Prepare and bind
        $stmt = $conn->prepare("UPDATE bike_table SET bike_name = ?, bike_image = ?, bike_price = ?, bike_details = ? 
                        WHERE bike_id = ?");
        $stmt->bind_param("ssisi", $bike_name, $bike_image, $bike_price, $bike_details, $bike_id);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Bike UPDATED successfully!";
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

    <form action="" method="POST">
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
      <input type="text" class="form-control mb-3" placeholder="Bike Name" required name="bike_name">
      <input type="file" class="form-control mb-3" placeholder="Bike Image Path" required name="bike_image" accept=".jpg,.jpeg">
      <input type="text" class="form-control mb-3" placeholder="Bike Price" required name="bike_price" pattern="[0-9]{5,6}">
      <textarea class="form-control mb-3" placeholder="Bike Details" required name="bike_details" rows="4"></textarea>
      <button type="submit" class="btn btn-success w-100">UPDATE BIKE</button>
    </form>
    <?php if ($message): ?>
      <p class="mt-3"><?php echo $message; ?></p>
       <?php if ($message === "Bike UPDATED successfully!"): ?>
            <audio id="successAudio2" src="IMAGES/updatebike.mp3" autoplay></audio>
            <script>
                // Play audio to bypass browser autoplay restrictions
                document.addEventListener('DOMContentLoaded', function() {
                    var audio = document.getElementById('successAudio2');
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
            const fileInput = document.querySelector('input[name="car_image"]');
            const file = fileInput.files[0];
            
            if (file) {
                const validExtensions = ['jpg', 'jpeg'];
                const fileExtension = file.name.split('.').pop().toLowerCase();
                
                if (!validExtensions.includes(fileExtension)) {
                    e.preventDefault();
                    alert('Only JPG and JPEG files are allowed!');
                }
            } else {
                e.preventDefault();
                alert('Please select a JPG or JPEG file!');
            }
        });
    </script>

</body>
</html>
