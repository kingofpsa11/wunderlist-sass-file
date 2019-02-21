<?php
session_start();
$error = [];
if(isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error["message"] = 'De nghi nhap';
        
    } else {
        include 'connection.php';
        $password = md5($_POST["password"]);
        $email = $_POST["email"];
        $sql = "SELECT COUNT(*) as number FROM users WHERE email='$email' AND password='$password'";
        // $sql = "SELECT * FROM users";
        $result = $conn->query($sql);        
        $array = $result->fetch_assoc();
        if ($array['number'] == 0) {
            $error["message"] = "The email or password you entered was incorrect. Please try again.";
            $_SESSION["error"] = $error["message"];        
            header("location: ./login.php");
        } else {
            setcookie("email", $email, time() + 86400);
            setcookie("password", $_POST["password"]);
            $_SESSION["error"] = "";
            header("location: ./index.php");
        }
        $conn->close();
    }
}

?>