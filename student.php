<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully to the database.<br>";
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO students (Name, Course, Age, Email, Phone) 
            VALUES ('$name', '$course', '$age', '$email', '$phone')";

    if (mysqli_query($conn, $sql) === TRUE) {
        echo "New student record created successfully<br><br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2><center><u>Student Details</u></center></h2>";
    echo "<table border='1' cellpadding='10' style='width: 100%; margin: auto;'>";
    echo "<tr style='background-color: #3498db; color: white;' >
            <th>ID</th><th>Name</th><th>Course</th><th>Age</th><th>Email</th><th>Phone</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Id']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Course']}</td>
                <td>{$row['Age']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Phone']}</td>
              </tr>";
    }
    echo "</table>";
} 

mysqli_close($conn);
?>
<html>
<head>
    <title>Student Management</title>
    <style>
        form {
            border: 1px solid royalblue;
            padding: 20px;
            width: 50%;
            margin: auto;
            background-color: #f0f8ff;
        }
        input[type="submit"] {
            background-color: royalblue;
            color: white;
            padding: 10px;
          
        }
        form, input, label, table, th, td { font-size: 20px; }
    </style>
</head>
<body>
<div style="text-align: center; margin-top: 2%;">
<h2><u>Add Student</u></h2>
<form method="POST" action="student.php">
    Name: <input type="text" name="name" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>

    <input type="submit" name="submit" value="Add Student">
</form>
</div>
</body>
</html>
