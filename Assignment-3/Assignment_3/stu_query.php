<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        form {
            margin: 0 auto;
            max-width: 500px;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 20px;
        }

        button[name="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button[name="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        <h2><u>Display Result</u></h2>
        <label for="redg"><b>Register Number</b></label>
        <input type="text" name="redg" required>
        <button name="submit"><b>Submit</b></button>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $result = $_POST['redg'];
        $_SESSION['res'] = $result;
        header("Location: details.php", true, 301);  
        exit();
    }
    ?>
</body>
</html>
