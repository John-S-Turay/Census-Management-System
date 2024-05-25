<?php
    // Include the database connection file
    include('./config/db.php');

    // Global variables to store messages for email verification
    global $emailVerifiedMessage, $emailAlreadyVerifiedMessage, $activationErrorMessage;

    // Check if the 'token' parameter is present in the GET request and assign it to a variable
    $token = !empty($_GET['token']) ? $_GET['token'] : "";

    // Proceed only if the token is not empty
    if ($token !== "") {
        // Prepare the SQL query to find a user with the provided token
        $stmt = $connection->prepare("SELECT * FROM users WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $countRow = $result->num_rows;

        // Check if exactly one user is found with the given token
        if ($countRow === 1) {
            while ($rowData = $result->fetch_assoc()) {
                // Get the 'is_active' status of the user
                $isActive = $rowData['is_active'];

                // Check if the user's email is not already verified
                if ($isActive == 0) {
                    // Prepare the SQL query to update the user's 'is_active' status
                    $updateStmt = $connection->prepare("UPDATE users SET is_active = 1 WHERE token = ?");
                    $updateStmt->bind_param("s", $token);
                    $updateSuccess = $updateStmt->execute();

                    // Check if the update query was successful
                    if ($updateSuccess) {
                        $emailVerifiedMessage = '<div class="alert alert-success">User email successfully verified!</div>';
                    }
                    $updateStmt->close();
                } else {
                    $emailAlreadyVerifiedMessage = '<div class="alert alert-danger">User email already verified!</div>';
                }
            }
        } else {
            $activationErrorMessage = '<div class="alert alert-danger">Activation error!</div>';
        }
        $stmt->close();
    }
?>
