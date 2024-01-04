<?php
require_once('config.php');

if (isset($_POST['signup'])) {
    // Gather form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $class = $_POST['class'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));  // Convert date format

    // Handle file upload (photo)
    if (isset($_FILES['photo'])) {
        $photo = file_get_contents($_FILES['photo']['tmp_name']);
    }

    // Prepare and execute the SQL INSERT statement
    $stmt = $link->prepare("INSERT INTO students (name, email, phone, class, dob, photo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssb", $name, $email, $phone, $class, $dob, $photo);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


$link->close();
?>
