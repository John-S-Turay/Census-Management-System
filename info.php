<?php
// Include the database connection
require_once('config/db.php');

/**
 * Sanitizes and formats SQL values based on their type.
 *
 * @param mixed $value The value to be sanitized.
 * @param string $type The data type of the value.
 * @param mixed $definedValue The defined value if the value is set.
 * @param mixed $notDefinedValue The value if the value is not set.
 *
 * @return mixed The sanitized value.
 */
function getSQLValueString($value, $type, $definedValue = "", $notDefinedValue = "") 
{
    // Check if magic quotes are enabled for GPC (Get/Post/Cookie)
    $magicQuotesEnabled = function_exists('get_magic_quotes_gpc') ? get_magic_quotes_gpc() : false;

    // If magic quotes are enabled, strip slashes from the value
    if ($magicQuotesEnabled && is_string($value)) {
        $value = stripslashes($value);
    }

    // Switch case based on data type
    switch ($type) {
        case "text":
            $value = ($value != "") ? "'" . $value . "'" : "NULL";
            break; 
        case "long":
        case "int":
            $value = ($value != "") ? intval($value) : "NULL";
            break;
        case "double":
            $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
            break;
        case "date":
            $value = ($value != "") ? "'" . $value . "'" : "NULL";
            break;
        case "defined":
            $value = ($value != "") ? $definedValue : $notDefinedValue;
            break;
    }

    return $value;
}

// Define the form action
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MM_insert"]) && $_POST["MM_insert"] == "form2") {
    // Prepare SQL statement
    $insertSQL = sprintf("INSERT INTO info (name, Relationship, sex, Age, `Name_of_mother`, `Household_number`, Nationality, Religion, `Marital_Status`, `Address`, `Duration_of_residence`, `is_father_alive`, `is_mother_alive`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
        getSQLValueString($_POST['name'], "text"),
        getSQLValueString($_POST['Relationship'], "int"),
        getSQLValueString($_POST['sex'], "text"),
        getSQLValueString($_POST['Age'], "int"),
        getSQLValueString($_POST['No_of_Mother'], "text"),
        getSQLValueString($_POST['Household_No'], "int"),
        getSQLValueString($_POST['Nationality'], "text"),
        getSQLValueString($_POST['Religion'], "int"),
        getSQLValueString($_POST['Marital_Status'], "int"),
        getSQLValueString($_POST['Address'], "text"),
        getSQLValueString($_POST['Duration_of_residence'], "text"),
        getSQLValueString($_POST['is_father_alive'], "text"),
        getSQLValueString($_POST['is_mother_alive'], "text"));

    // Select database
    mysqli_select_db($connection, "registration");

    // Execute SQL statement
    $Result1 = mysqli_query($connection, $insertSQL) or die(mysqli_error());

    // Define redirect URL
    $insertGoTo = "home.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }

    // Redirect to specified URL
    header(sprintf("Location: %s", $insertGoTo));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Information</title>
<style>
    .style1 {
        font-size: 36px;
    }
    body {
        background-color: skyblue;
    }
</style>
</head>
<body>
<form name="form1" method="post" action="">
 <p align="center" class="style1"><strong>Republic of Sierra Leone </strong></p>
 <p align="center" class="style1"><strong>Population and Housing Census </strong></p>
 <p align="center" class="style1"><strong>Please Fill in the information Regarding All Persons:</strong></p>
</form>
<form method="
