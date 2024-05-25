<?php
// Include the database connection
include('config/db.php');

// Function to sanitize and format values for SQL queries
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
    // Check if magic quotes are enabled and sanitize input if needed
    $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
    
    // Format the value based on its type
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

// Define the action for the form submission
$editFormAction = $_SERVER['PHP_SELF'];

// Check if there are any query parameters and append them to the action URL
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// Check if the form has been submitted
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
    // Construct the SQL query to insert data into the database
    $insertSQL = sprintf("INSERT INTO orphanhood (birth, occured, Name_of_person, Was_this_death_notified, How_old_was_the_person, male_or_female) VALUES (%s, %s, %s, %s, %s, %s)",
        GetSQLValueString($_POST['How_many_live_birth_occured_in_this_household_during_dates_state'], "int"),
        GetSQLValueString($_POST['how_many_deaths_occured_in_this_household_between_stated_dates'], "int"),
        GetSQLValueString($_POST['Name_of_the_household_member_who_died'], "text"),
        GetSQLValueString($_POST['Was_this_death_notified'], "text"),
        GetSQLValueString($_POST['How_old_was_the_person'], "int"),
        GetSQLValueString($_POST['malefemale'], "text"));
    
    // Select the database
    mysqli_select_db($connection, "registration");
    
    // Execute the query and handle errors if any
    $Result1 = mysqli_query($connection, $insertSQL) or die(mysqli_error());
    
    // Redirect the user to the home page after successful insertion
    $insertGoTo = "home.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Orphanhood</title>
    <style type="text/css">
        <!--
        .style1 {font-size: 36px}
        body {
            background-color: #00FFFF;
        }
        -->
    </style>
</head>
<body>
    <form name="form1" method="post" action="">
        <p align="center" class="style1"><strong>Republic of Sierra Leone </strong></p>
        <p align="center" class="style1"><strong>Population and Housing Census </strong></p>
        <p align="center" class="style1"><strong>Please Fill in the information About Deaths in the
            Household Form:</strong></p>
    </form>
    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
        <table align="center">
            <tr valign="baseline">
                <td nowrap align="right">How many live birth occurred in this household during dates state:</td>
                <td><input type="text" name="How_many_live_birth_occurred_in_this_household_during_dates_state" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">How many deaths occurred in this household between stated dates:</td>
                <td><input type="text" name="how_many_deaths_occurred_in_this_household_between_stated_dates" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Name of the household member who died:</td>
                <td><input type="text" name="Name_of_the_household_member_who_died" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Was this death notified:</td>
                <td><input type="text" name="Was_this_death_notified" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">How old was the person:</td>
                <td><input type="text" name="How_old_was_the_person" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Male/female:</td>
                <td><input type="text" name="malefemale" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td><input type="submit" value="Insert record">
                    <input type="reset" name="Reset" value="Clear"></td>
            </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form2">
    </form>
    <p>&nbsp;</p>
</body>
</html>
