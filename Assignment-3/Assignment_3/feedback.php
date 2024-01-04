<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .im {
            text-align: center;
            margin-top: 20px;
        }

        .im img {
            max-width: 200px;
            height: auto;
        }

        p {
            text-align: center;
            color: red;
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        pre {
            margin-left: auto;
            margin-right: auto;
            max-width: 800px;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        pre::before {
            content: "Student Feedback Report for 2022-23(1-5 means Low-High)";
            display: block;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        pre code {
            font-size: 14px;
            color: #333;
        }

        pre br {
            display: none;
        }
    </style>
</head>
<body>
    <div class="im">
        <img src="image/logo.jpg" alt="Vignan">
    </div>
    <p>Student Feedback Report for 2022-23 (1-5 means Low-High)</p>
    <pre>
       <?php
        $res = $_SESSION['res'];
        $query1 = mysqli_query($conn,"SELECT * FROM `student` WHERE `regdNo` LIKE '$res'");
        while($field = mysqli_fetch_assoc($query1))
        {
            $name  =$field['Name'];
            $Branch = $field['branch'];
            $cr = $field['course'];
            $regul = $field['regulation'];
        }
        $query2 = mysqli_query($conn,"SELECT * FROM `personal` WHERE `Name` LIKE '$name'");
        while($col = mysqli_fetch_assoc($query2))
        {
            $year = $col['Year'];
        }
        $query3 = mysqli_query($conn,"SELECT * FROM `questionaire` WHERE `regdNo` LIKE '$res'");
        while($column = mysqli_fetch_assoc($query3))
        {
            $r1 = $column['first'];
            $r2 = $column['second'];
            $r3 = $column['third'];
            $r4 = $column['fourth'];
            $r5 = $column['fifth'];
            $r6 = $column['sixth'];
            $r7 = $column['seventh'];
        }
        echo '<br>';
        echo 'Regd No.                                                                                                              :  '.$res.'<br>';
        echo 'Name                                                                                                                  :  '.$name.'<br>';
        echo 'Course                                                                                                                :  '.$cr.'<br>';
        echo 'Branch                                                                                                                :  '.$Branch.'<br>';
        echo 'Acedemic Year                                                                                                         :  '.$year.'<br>';
        echo 'Regulation                                                                                                            :  '.$regul.'<br>';
        echo 'Course Contents of Curriculum are in tune with the Program Outcomes                                                   :  '.$r1.'<br>';
        echo 'Course Contents are designed to enable Problem Solving Skills and Core Competencies                                   :  '.$r2.'<br>';
        echo 'Course places in the carriculum serves the needs of both advanced and slow learners                                   :  '.$r3.'<br>';
        echo 'Contact Hour Distribution among the various Course Components(LTP) is Satisfiable                                     :  '.$r4.'<br>';
        echo 'Composition of Basic Science,Engineering, Humanities and Management Course is a right mix and satisfiable             :  '.$r5.'<br>';
        echo 'Laboratory sessions are sufficient to improve the technical skills of students                                        :  '.$r6.'<br>';
        echo 'Inclusion of Minor Project/Mini Project improved the technical competency and leadership skills among the students    :  '.$r7.'<br>';
        ?>
    </pre>
</body>
</html>
