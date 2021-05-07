<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Budget App | DedSoft</title>
    <link rel="shortcut icon" href="img/dedsoft-favicon.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div id="logreg-container">
        <h2>Simple Budget App</h2>
        <form action="includes/login.inc.php" method="post" id='login-form'>
            <label for="user">Username/Email:</label>
            <input type="text" name="user" id="" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="" required>
            <input type="submit" name="log-submit" value="Log In">
            <a href="#" onclick='showRegister()'>New User? Register Now.</a>
        </form>
        <form action="includes/register.inc.php" method="post" id='register-form'>
            <label for="username">Username:</label>
            <input type="text" name="username" id="" required>
            <label for="email">Email:</label>
            <input type="text" name="email" id="" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="" required>
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" id="" required>
            <!-- reCAPTCHAv2 -->
            <div id="recaptcha-container">
                <div class="g-recaptcha" data-sitekey="6LfOB4YUAAAAAFTW4OXLzc_MkpgtOHFnpgS07P-s"></div>
            </div>
            <input type="submit" name="reg-submit" value="Register">
            <a href="#" onclick='showLogin()'>Already Registered? Log In.</a>
        </form>
    </div>

    <!-- JavaScript -->
    <!-- <script src="https://kit.fontawesome.com/0cc9ed9ba6.js" crossorigin="anonymous"></script> -->
    <script src="js/logreg.js"></script>
</body>
</html>
