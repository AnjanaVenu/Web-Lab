<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$database = "college";       


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$insert_sql = "INSERT INTO students (name, course, age, email, phone) VALUES
('Ann', 'Computer Science', 21, 'ann123@gmail.com', '2345422332'),
('Karan', 'Civil', 23, 'karan45@gmail.com', '9876423450'),
('Soumya', 'Electronics', 21, 'soumya5@gmail.com', '2345323249'),
('Christy', 'MCA', 22, 'christy333@gmail.com', '1796436727'),
('Jacob', 'Mechanical', 23, 'jacob4552@gmail.com', '7675424690'),
('Dona', 'MCA', 23, 'dona235@gmail.com', '9786422456')";

if (mysqli_query($conn, $insert_sql)) {
    echo "Records inserted successfully!<br>";
} else {
    echo "Error inserting records: " . mysqli_error($conn) . "<br>";
}

$sql = "SELECT id, name, course, age, email, phone FROM students"; 
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            font-family: Bookman, URW Bookman L, serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #00DDFF;
            font-weight: bold;
        }
        h1 {
            font-family: Bookman, URW Bookman L, serif;
            background-color: #0049B7 ;
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Student Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["course"] . "</td>
                        <td>" . $row["age"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        
    
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
