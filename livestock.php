<?php
// Include the database connection
require_once 'config/db.php';

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
        case 'text':
            $value = ($value !== '') ? "'" . $value . "'" : "NULL";
            break; 
        case 'long':
        case 'int':
            $value = ($value !== '') ? intval($value) : "NULL";
            break;
        case 'double':
            $value = ($value !== '') ? "'" . doubleval($value) . "'" : "NULL";
            break;
        case 'date':
            $value = ($value !== '') ? "'" . $value . "'" : "NULL";
            break;
        case 'defined':
            $value = ($value !== '') ? $definedValue : $notDefinedValue;
            break;
    }

    return $value;
}

// Define the form action
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= '?' . htmlentities($_SERVER['QUERY_STRING']);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['MM_insert']) && $_POST['MM_insert'] === 'form2') {
    // Prepare SQL statement
    $insertSQL = sprintf(
        "INSERT INTO livestock (Cat, Dog, Sheep, Goat, Cow, Pigs, Chicken, Duck, Monkey, Other) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
        getSQLValueString($_POST['Cat'], 'int'),
        getSQLValueString($_POST['Dog'], 'int'),
        getSQLValueString($_POST['Sheep'], 'int'),
        getSQLValueString($_POST['Goat'], 'int'),
        getSQLValueString($_POST['Cow'], 'int'),
        getSQLValueString($_POST['Pigs'], 'int'),
        getSQLValueString($_POST['Chicken'], 'int'),
        getSQLValueString($_POST['Duck'], 'int'),
        getSQLValueString($_POST['Monkey'], 'int'),
        getSQLValueString($_POST['Other'], 'int')
    );

    // Select database
    mysqli_select_db($connection, "registration");

    // Execute SQL statement
    $Result1 = mysqli_query($connection, $insertSQL) or die(mysqli_error());

    // Define redirect URL
    $insertGoTo = 'home.php';
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? '&' : '?';
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }

    // Redirect to specified URL
    header("Location: $insertGoTo");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Livestock</title>
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
        <p align="center" class="style1"><strong>Please Fill in the Livestock Details:</strong></p>
    </form>
    <form method="post" name="form2" action="<?= htmlspecialchars($editFormAction); ?>">
        <table align="center">
            <tr valign="baseline">
                <td nowrap align="right">Cat:</td>
                <td><input type="text" name="Cat" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Dog:</td>
                <td><input type="text" name="Dog" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Sheep:</td>
                <td><input type="text" name="Sheep" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Goat:</td>
                <td><input type="text" name="Goat" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Cow:</td>
                <td><input type="text" name="Cow" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Pigs:</td>
                <td><input type="text" name="Pigs" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Chicken:</td>
                <td><input type="text" name="Chicken" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Duck:</td>
                <td><input type="text" name="Duck" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Monkey:</td>
                <td><input type="text" name="Monkey" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Other:</td>
                <td><input type="text" name="Other" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td><input type="submit" value="Insert record"> <input type="reset" name="Reset" value="Clear"></td>
            </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form2">
    </form>
    <p>&nbsp;</p>
</body>
</html>
