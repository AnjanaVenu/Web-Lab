<?php
    $con = mysqli_connect('localhost', 'root', '', 'studentsinfo');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $q = "INSERT INTO studentsdata (name, course, age, email, phone) VALUES ('$name', '$course', '$age', '$email', '$phone')";
        if (mysqli_query($con, $q)) {
            header("Location: showdetails.php");
        } else {
            die("Error: " . mysqli_error($con));
        }
    }

    mysqli_close($con);
?>
