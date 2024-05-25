<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Census Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header -->
    <?php include('../form/header.php'); ?>

    <!-- Login script -->
    <?php include('./controllers/login.php'); ?>

    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Login</h3>

                    <?= isset($accountNotExistErr) ? $accountNotExistErr : ''; ?>
                    <?= isset($emailPwdErr) ? $emailPwdErr : ''; ?>
                    <?= isset($verificationRequiredErr) ? $verificationRequiredErr : ''; ?>
                    <?= isset($email_empty_err) ? $email_empty_err : ''; ?>
                    <?= isset($pass_empty_err) ? $pass_empty_err : ''; ?>

                    <div class="form-group">
                        <label for="email_signin">Email</label>
                        <input type="email" class="form-control" name="email_signin" id="email_signin" required />
                    </div>

                    <div class="form-group">
                        <label for="password_signin">Password</label>
                        <input type="password" class="form-control" name="password_signin" id="password_signin" required />
                    </div>

                    <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
