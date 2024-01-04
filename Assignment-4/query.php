<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Retrieval</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Retrieve Student Information</h1>
        <form action="info.php" method="POST">
            <label for="email">Enter Student Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Retrieve</button>
        </form>
    </div>
</body>
</html>
