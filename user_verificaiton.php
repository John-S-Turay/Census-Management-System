<?php 
    // Include the user activation logic
    include('./controllers/user_activation.php'); 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>User Verification</title>

    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Container for the main content -->
    <div class="container">
        <!-- Jumbotron for the main content -->
        <div class="jumbotron text-center">
            <h1 class="display-4">User Email Verification Demo</h1>
            <!-- Display email verification messages -->
            <div class="col-12 mb-5 text-center">
                <?php echo $email_already_verified; ?>
                <?php echo $email_verified; ?>
                <?php echo $activation_error; ?>
            </div>
            <!-- Prompt users to login if account is verified -->
            <p class="lead">If user account is verified then click on the following button to login.</p>
            <a class="btn btn-lg btn-success" href="http://localhost/form/index.php">Click to Login</a>
        </div>
    </div>

</body>

</html>
