<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blurred Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="hero-login d-flex justify-content-center align-items-center">
    <!-- <?php
      $mass =  $_GET['Message'];
        echo "<h2>$mass</h2>";
?> -->

  <div class="glass-card p-4" style="width: 320px;">
    <h2 class="text-center mb-4">Admin Panel</h2>
    <form action="validate.php" method="POST">
      <input type="text" class="form-control mb-3" placeholder="AdminName" required name="uname">
      <input type="password" class="form-control mb-3" placeholder="Password" required name="pass">
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
  </div>

</body>
</html>
