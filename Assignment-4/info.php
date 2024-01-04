<?php
require_once('config.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $stmt = $link->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Student Information</title>
                    <link href='styles.css' rel='stylesheet'>
                </head>
                <body>
                    <div class='container'>
                        <h1>Student Information</h1>
                        <div class='student-info'>
                            <div class='student-photo'>
                                <img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Student Photo'>
                            </div>
                            <div class='student-details'>
                                <p><strong>Name:</strong> {$row['name']}</p>
                                <p><strong>Email:</strong> {$row['email']}</p>
                                <p><strong>Phone:</strong> {$row['phone']}</p>
                                <p><strong>Class:</strong> {$row['class']}</p>
                                <p><strong>Date of Birth:</strong> {$row['dob']}</p>
                            </div>
                        </div>
                    </div>
                </body>
                </html>";
        } else {
            echo "Student with this email not found.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>
