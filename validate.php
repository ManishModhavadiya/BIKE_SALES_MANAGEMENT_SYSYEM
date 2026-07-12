<?php
// Step 1: Database connection
$servername = "localhost";
$username = "root";  
$password = "";      
$database = "bike_db"; 

$conn = new mysqli($servername, $username, $password, $database);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Get form data
$admin = $_POST['uname'];
$pass = $_POST['pass'];

// Step 4: Fetch admin record
$sql = "SELECT Admin_uname, Admin_password FROM admin01 WHERE Admin_uname = '$admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Step 5: Compare input with DB values
    if ($admin === $row['Admin_uname'] && $pass === $row['Admin_password']) {
        $Message = urlencode("Login successfully");
        header("Location: admin.php?Message=" . $Message);
        exit;
    } else {
        $Message = urlencode("Wrong password, please try again");
        header("Location: wrong.php?Message=" . $Message);
        exit;
    }
} else {
    $Message = urlencode("Admin not found");
    header("Location: wrong.php?Message=" . $Message);
    exit;
}

$conn->close();
?>
