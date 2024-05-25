<?php include('./controllers/register.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP User Registration System Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
   
   <?php include('./header.php'); ?>

    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post" novalidate>
                    <h3>Register</h3>

                    <?php if (isset($success_msg)) echo $success_msg; ?>
                    <?php if (isset($email_exist)) echo $email_exist; ?>

                    <?php if (isset($email_verify_err)) echo $email_verify_err; ?>
                    <?php if (isset($email_verify_success)) echo $email_verify_success; ?>

                    <div class="form-group">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="firstname" id="firstName" required>
                        <?php if (isset($fNameEmptyErr)) echo $fNameEmptyErr; ?>
                        <?php if (isset($f_NameErr)) echo $f_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="lastname" id="lastName" required>
                        <?php if (isset($lNameEmptyErr)) echo $lNameEmptyErr; ?>
                        <?php if (isset($l_NameErr)) echo $l_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <?php if (isset($_emailErr)) echo $_emailErr; ?>
                        <?php if (isset($emailEmptyErr)) echo $emailEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label for="mobilenumber">Mobile</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required>
                        <?php if (isset($_mobileErr)) echo $_mobileErr; ?>
                        <?php if (isset($mobileEmptyErr)) echo $mobileEmptyErr; ?>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        <?php if (isset($_passwordErr)) echo $_passwordErr; ?>
                        <?php if (isset($passwordEmptyErr)) echo $passwordEmptyErr; ?>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Sign up</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
