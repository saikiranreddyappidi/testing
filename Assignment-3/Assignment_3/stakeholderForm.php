<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: blue;
            text-decoration: underline;
        }

        .personal {
            border: 2px solid #333;
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
        }

        .personal label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .personal input[type="text"],
        .personal input[type="number"],
        .personal input[type="email"],
        .personal select,
        .personal input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .personal select {
            height: 40px;
        }

        .personal .gender-wrapper {
            display: flex;
            align-items: center;
        }

        .personal button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .personal button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <h1>PERSONAL DETAILS</h1>
    <form action="#" method="post">
        <div class="personal">
            <div class="first">
                <label for="stakename">Name of the Stakeholder</label>
                <input type="text" name="stakename" placeholder="Please enter your firstname" required>
                <label for="ph">Phone</label>
                <input type="number" name="ph" placeholder="Please enter your phone" required>
                <label for="feedback">Feedback for Academic Year</label>
                <select name="feedback" id="acd" required>
                    <option value="" disabled selected>Select the Academic Year</option>
                    <option value="2022-23">2022-23</option>
                </select>
            </div>
            <div class="second">
                <label for="type">Type of the Stakeholder</label>
                <select name="type" id="detail" required>
                    <option value="" disabled selected>Select the type</option>
                    <option value="Student">Student</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Alumni">Alumni</option>
                </select>
                <label for="mail">Email</label>
                <input type="email" placeholder="Please enter your email" name="mail" required>

                <div class="gender-wrapper">
                    <label for="gen">Gender</label>
                    <input type="radio" name="gender" value="Male" class="gen" required> Male
                    <input type="radio" name="gender" value="Female" class="gen" required> Female
                </div>

                <br>
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $naam = $_POST['stakename'];
        $ph = $_POST['ph'];
        $yr = $_POST['feedback'];
        $type = $_POST['type'];
        $mail = $_POST['mail'];
        $gen = $_POST['gender'];
        $_SESSION['name'] = $naam;
        $query = mysqli_query($conn,"INSERT INTO `personal` (`Name`, `Phone`, `Year`, `Type`, `mail`, `gender`) VALUES ('$naam', '$ph', '$yr', '$type', '$mail', '$gen')");
        if($query)
        {
            header("Location: student.php", true, 301);  
            exit();
        }
        else{
            echo '<script>
            alert("Error while inserting data!!");
        </script>';
        }
    }
    ?>
</body>
</html>
