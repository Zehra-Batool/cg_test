<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO users (name, email, phone,password,role )
                VALUES ('$name', '$email', '$phone', '$pass',2)";
    $result =$conn->query($sql);
    if ($result) {
        echo '<script>alert("Succesfully Registered You can login Now");window.location.href="login.php"</script>';
    }
else {
        echo '<script>alert("Registration Failed");window.location.href="register.php"</script>';
}

}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="inner-container">

            <div class="header">
                <h1>Register To Create New Account</h1>
            </div>
            <form action="" method="post">
                <div class="feilds">
                    <label for="name">Name:</label>
                    <input type="name" name="name" id="name">
                </div>
                <div class="feilds">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="feilds">
                    <label for="phone">Phone:</label>
                    <input type="number" name="phone" id="phone">
                </div>
                <div class="feilds">

                    <label for="pass">Create Password:</label>
                    <input type="password" name="pass" id="pass">
                </div>
                <div class="feilds">
                    <input type="submit" class="submit-button">
                </div>
            </form>
            <a href="login.php">Already have an account? Login Now</a>
        </div>
    </div>

</body>

</html>