<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $subject = htmlspecialchars($_POST["subject"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill all required fields";
        exit;
    }

    $newMessage = [
        "name" => $name,
        "email" => $email,
        "subject" => $subject,
        "message" => $message,
        "date" => date("Y-m-d H:i:s")
    ];

    $file = "data.json";

    if (file_exists($file)) {
        $oldData = json_decode(file_get_contents($file), true);
        if (!is_array($oldData)) {
            $oldData = [];
        }
    } else {
        $oldData = [];
    }

    $oldData[] = $newMessage;

    file_put_contents($file, json_encode($oldData, JSON_PRETTY_PRINT));

    echo "<h2>Thank you $name</h2>";
    echo "<p>Your message has been received.</p>";
}
?>