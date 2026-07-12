<html>
    <head>
        <title>Home</title>
        <!-- <link rel="stylesheet" href="style01.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="hero-bike">
        <div class="header">
            <nav class="navbar navbar-expand-lg text-center">
                <div class="container-fluid flex-wrap ">
                    <div class="admin-actions d-flex flex-wrap gap-2 py-2">
                        <input type="button" name="Add Car" class="btn btn-warning fw-bold" value="Add Bike" onclick="window.location.href='addbike.php'">
                        <input type="button" name="Remove Cars" class="btn btn-warning fw-bold" value="Remove Bike" onclick="window.location.href='Removebike.php'">
                        <input type="button" name="UPDATE CAR" class="btn btn-warning fw-bold" value="Update Bike " onclick="window.location.href='Updatebike.php'">
                        <input type="button" name="Logout" class="btn btn-warning fw-bold" value="Log out" onclick="window.location.href='index.php'">
                        <input type="button" name="view car" class="btn btn-warning fw-bold" value="View Bikes" onclick="window.location.href='bikes.php'">
                        <input type="button" name="view car" class="btn btn-warning fw-bold" value="ORDERS" onclick="window.location.href='orders.php'">
                    </div>

                    <!-- Admin login logout msg  -->
                    <div class="msg-box ms-auto">
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

            <div class="mb-5" style="font-size: 300px; font-weight: bold; color:red; font-family: 'Arial', sans-serif-ms; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            <pre><h1 class="display-1  text-start  text-red fw-bold" style="font-size: 40px; text-shadow: 2px 2px 4px rgba(198, 175, 175, 0.5);">
                Ride With Hero...,
                Pride in Every Ride, 
                Adventure Awaits!
                      </h1></pre>
         </div>
        </div>
        <hr class="border-light">
   
              
            </footer>
            </body>
            </html>
