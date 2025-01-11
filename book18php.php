<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$title = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];


$sql = "INSERT INTO books (title, author, edition, publisher) VALUES ('$title', '$author', '$edition', '$publisher')";

if ($conn->query($sql) === TRUE) {
    echo "New book record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
