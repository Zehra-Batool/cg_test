<?php
include 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email'AND password = '$pass'";
    $result= $conn->query($query);
    $creds= $result->num_rows >= 1 ? $result->fetch_assoc() : null;

    if ($creds) {
 if (isset($creds['aname'])) {
            $_SESSION['name'] = $creds['name'];
            $_SESSION['email'] = $creds['email'];
            $_SESSION['phone'] = $creds['phone'];
            $_SESSION['role'] = $creds['role'];
            $redirectUrl = 'consumer/index.php';
        }
       

        echo '<script>alert("Successfully Logged In");window.location.href="index.php";</script>';
    }

    
    if(!$creds){
        echo '<script>alert("Invalid Email or Password");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="inner-container">

            <div class="header">
                <h1>Login To Your Dashboard</h1>
            </div>
            <form action="" method="post">
                <div class="feilds">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="feilds">

                    <label for="pass">Password:</label>
                    <input type="password" name="pass" id="pass">
                </div>
                <div class="feilds">
                    <input type="submit" class="submit-button">
                </div>
            </form>
            <a href="register.php">Dont have an account? Register Now</a>
        </div>
    </div>

</body>

</html>