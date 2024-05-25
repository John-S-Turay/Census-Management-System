<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to the homepage
header("Location: http://localhost/form/index.php");

// Ensure no further code is executed after the redirect
exit();
?>
