<?php 
session_start();

if(!isset($_SESSION['email'])){
    echo '<script>alert("You are not Logged in Redirecting you to login");window.location.href="login.php"</script>';
}
?>