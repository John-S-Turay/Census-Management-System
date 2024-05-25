<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dashboard</title>
</head>
<body style="background-color: #00FFCC; color: #660000;">
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h6>
                    <p class="card-text">Email address: <?php echo $_SESSION['email']; ?></p>
                    <p class="card-text">Mobile number: <?php echo $_SESSION['mobilenumber']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <form name="form1" method="post" action="">
        <p align="center" style="font-size: 36px;"><strong><img src="STATSSL.jpg" width="100" height="120" align="left">Republic of Sierra Leone</strong></p>
        <p align="center" style="font-size: 36px;"><strong>Population and Housing Census</strong></p>
        
        <!-- Sidebar -->
        <table width="200" height="414" border="1" align="left">
            <tr>
                <td><a href="assets.php">ASSETS</a></td>
            </tr>
            <tr>
                <td><a href="info.php">GENERAL INFORMATION</a></td>
            </tr>
            <tr>
                <td><a href="disability.php">DISABILITY</a></td>
            </tr>
            <tr>
                <td><a href="livestock.php">LIVESTOCK</a></td>
            </tr>
            <tr>
                <td><a href="orphanhood.php">ORPHANHOOD</a></td>
            </tr>
        </table>
        
        <!-- Vision, Mission, and Goal -->
        <p align="center" style="font-size: 36px;"><strong><img src="STATSSL.jpg" width="55" height="60" align="baseline"></strong></p>
        <p align="center" style="font-size: 36px;"><strong>VISION</strong></p>
        <p align="center" style="font-size: 14px;">National Development Planning to Create a Better Quality of Life for all Sierra Leoneans</p>
        <p align="center" style="font-size: 36px;"><strong>MISSION</strong></p>
        <p align="center" style="font-size: 14px;">To provide leadership in policy formulation, provision of quality information and statistical data and coordinating sound economic policies for sustainable development.</p>
        <p align="center" style="font-size: 36px;"><strong>GOAL</strong></p>
        <p align="center" style="font-size: 14px;">Enhanced capacity in national planning and policy management for improved living standards of Sierra Leoneans</p>
        
        <!-- Core Functions -->
        <p align="center" style="font-size: 14px;"><strong>Our Core Functions</strong></p>
        <div align="center">
            <ul>
                <li>The coordination of government economic policies, including regional and international cooperation policies;</li>
                <li>The coordination and preparation of the planning components of the Medium Term Expenditure Framework(MTEF); the Fiscal Strategy Paper and the requisite budget documents;</li>
                <li>The provision of leadership and coordination in the preparation of the main National Development Plan documents, including the District Development Plans; National Development Plans, and specific socio-economic programmes and plans;</li>
                <li>The coordination and management of population, economic and national statistical services within government; and</li>
                <li>The Coordination and provision of leadership in the national Monitoring and Evaluation (M&E) framework.</li>
            </ul>
        </div>
        
        <!-- Logout Link -->
        <p align="center"><a href="logout.php">LOG OUT</a></p>
    </form>
</body>
</html>
