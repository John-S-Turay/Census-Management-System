<?php
    // Include the database connection
    include('config/db.php');

    /**
     * Function to sanitize and format SQL values based on their type.
     *
     * @param mixed $theValue        The value to be sanitized.
     * @param string $theType        The data type of the value.
     * @param string $theDefinedValue The defined value if the value is set.
     * @param string $theNotDefinedValue The value if the value is not set.
     *
     * @return mixed                The sanitized value.
     */
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
        // Check if magic quotes are enabled
        if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
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
        $insertSQL = sprintf("INSERT INTO assets (Radio, TV, Phone, Landline, Computer, Bicycle, House, Car, Fan, Lorry, Refrigerator, DSTV, microwave, Other) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($_POST['Radio'], "int"),
            GetSQLValueString($_POST['TV'], "int"),
            GetSQLValueString($_POST['Phone'], "int"),
            GetSQLValueString($_POST['Landline'], "int"),
            GetSQLValueString($_POST['Computer'], "int"),
            GetSQLValueString($_POST['Bicycle'], "int"),
            GetSQLValueString($_POST['House'], "int"),
            GetSQLValueString($_POST['Car'], "int"),
            GetSQLValueString($_POST['Fan'], "int"),
            GetSQLValueString($_POST['Lorry'], "int"),
            GetSQLValueString($_POST['Refrigerator'], "int"),
            GetSQLValueString($_POST['DSTV'], "int"),
            GetSQLValueString($_POST['microwave'], "int"),
            GetSQLValueString($_POST['Other'], "int"));

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
