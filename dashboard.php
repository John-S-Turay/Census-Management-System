<?php 
// Include the database configuration file
include('config/db.php'); 
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport settings -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    
    <title>Census Management System</title>
    
    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    
                    <!-- Display the user's first and last name -->
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php echo htmlspecialchars($_SESSION['firstname']); ?>
                        <?php echo htmlspecialchars($_SESSION['lastname']); ?>
                    </h6>
                    
                    <!-- Display the user's email address -->
                    <p class="card-text">Email address: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                    
                    <!-- Display the user's mobile number -->
                    <p class="card-text">Mobile number: <?php echo htmlspecialchars($_SESSION['mobilenumber']); ?></p>
                    
                    <!-- Logout button -->
                    <a class="btn btn-danger btn-block" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
