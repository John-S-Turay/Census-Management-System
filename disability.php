<?php
// Include the database connection
require_once('config/db.php');

/**
 * Sanitizes and formats SQL values based on their type.
 *
 * @param mixed $theValue The value to be sanitized.
 * @param string $theType The data type of the value.
 * @param string $theDefinedValue The defined value if the value is set.
 * @param string $theNotDefinedValue The value if the value is not set.
 *
 * @return mixed The sanitized value.
 */
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
    // Check if magic quotes are enabled for GPC (Get/Post/Cookie)
    $magicQuotesEnabled = function_exists('get_magic_quotes_gpc') ? get_magic_quotes_gpc() : false;

    // If magic quotes are enabled, strip slashes from the value
    if ($magicQuotesEnabled && is_string($theValue)) {
        $theValue = stripslashes($theValue);
    }

    // Switch case based on data type
    switch ($theType) {
        case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break; 
        case "long":
        case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
    }

    return $theValue;
}

// Define the form action
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MM_insert"]) && $_POST["MM_insert"] == "form2") {
    // Prepare SQL statement
    $insertSQL = sprintf("INSERT INTO disability (`What is the type of disability`, difficulties) VALUES (%s, %s)",
        GetSQLValueString($_POST['What_is_the_type_of_disability'], "int"),
        GetSQLValueString($_POST['is_there_any_difficulties_in_the_disability'], "int"));

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
<title>Disability</title>
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
    <p align="center" class="style1"><strong>Republic of Sierra Leone</strong></p>
    <p align="center" class="style1"><strong>Population and Housing Census</strong></p>
    <p align="center" class="style1"><strong>Please Fill in the Disability Form:</strong></p>
</form>
<form method="post" name="form2" action="<?php echo htmlspecialchars($editFormAction); ?>">
    <table align="center">
        <tr valign="baseline">
            <td nowrap align="right">What is the type of disability:</td>
            <td><input type="text" name="What_is_the_type_of_disability" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Is there any difficulties in the disability:</td>
            <td><input type="text" name="is_there_any_difficulties_in_the_disability" value=""
            size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="Insert record">
            <input type="reset" name="Reset" value="Clear"></td>
        </tr>
    </table>
    <p>&nbsp; </p>
    <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
</body>
</html>
