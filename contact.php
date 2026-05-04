<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $subject = htmlspecialchars($_POST["subject"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    if(empty($name) || empty($email) || empty($message)){
        echo "Please fill all required fields";
    } else {
        echo "<h2>Thank you $name</h2>";
        echo "<p>Your message has been received.</p>";
    }
}
?>