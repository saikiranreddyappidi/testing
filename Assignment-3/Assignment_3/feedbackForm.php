<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            text-decoration: underline;
            padding-top: 20px;
        }

        form {
            background-color: #ffffff;
            border: 2px solid #ccc;
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            color: #444;
            font-weight: bold;
        }

        input[type="range"] {
            width: 70%;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[name="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[name="submit"]:hover {
            background-color: #0056b3;
        }

        .progress-container {
            margin-top: 20px;
            text-align: center;
        }

        .progress-bar {
            width: 0%;
            height: 20px;
            background-color: #007bff;
            transition: width 0.5s;
        }
    </style>
</head>
<body>
    <h2><u>QUESTIONNAIRE FOR STUDENT</u></h2>
    <form action="#" method="post">
        <label for="r1">Course Contents of Curriculum are in tune with the Program Outcomes</label><br>
        1 means low <input type="range" name="r1" min="1" max="5"> 5 means High<br>
        <label for="r2">Course Contents are designed to enable Problem Solving Skills and Core Competencies</label><br>
        1 means low <input type="range" name="r2" min="1" max="5"> 5 means High<br>
        <label for="r3">Course places in the curriculum serve the needs of both advanced and slow learners</label><br>
        1 means low <input type="range" name="r3" min="1" max="5"> 5 means High<br>
        <label for="r4">Contact Hour Distribution among the various Course Components (LTP) is Satisfiable</label><br>
        1 means low <input type="range" name="r4" min="1" max="5"> 5 means High<br>
        <label for="r5">Composition of Basic Science, Engineering, Humanities, and Management Courses is the right mix and satisfiable</label><br>
        1 means low <input type="range" name="r5" min="1" max="5"> 5 means High<br>
        <label for="r6">Laboratory sessions are sufficient to improve the technical skills of students</label><br>
        1 means low <input type="range" name="r6" min="1" max="5"> 5 means High<br>
        <label for="r7">Inclusion of Minor Project/Mini Project improved the technical competency and leadership skills among the students</label><br>
        1 means low <input type="range" name="r7" min="1" max="5"> 5 means High<br>
        <label for="sug">Suggest any other point to improve curriculum</label><br>
        <textarea name="sug" id="" cols="90" rows="3"></textarea><br>
        <button name="submit"><b>Submit</b></button>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </form>
    <script>
        // Simulate progress bar
        document.querySelector('form').addEventListener('submit', function () {
            const progressBar = document.querySelector('.progress-bar');
            progressBar.style.width = '100%';
            setTimeout(() => {
                progressBar.style.width = '0%';
            }, 2000);
        });
    </script>
     <?php
    if(isset($_POST['submit']))
    {
        $row1 = $_POST['r1'];
        $row2 = $_POST['r2'];
        $row3 = $_POST['r3'];
        $row4 = $_POST['r4'];
        $row5 = $_POST['r5'];
        $row6 = $_POST['r6'];
        $row7 = $_POST['r7'];
        $registration = $_SESSION['reges'];
        $query1 = mysqli_query($conn,"INSERT INTO `questionaire` (`regdNo`,`first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`) VALUES ('$registration','$row1', '$row2', '$row3', '$row4', '$row5', '$row6', '$row7')");
        if($query1)
        {
            echo '<script>
            alert("Data inserted successfully!!");
        </script>';
        header("Location: display.php", true, 301);  
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
