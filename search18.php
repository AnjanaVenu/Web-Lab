<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$author = $_GET['author'];

$sql = "SELECT * FROM books WHERE author LIKE '%$author%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Search Results</h2>";
    echo "<table border='1'><tr><th>Book ID</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['book_id']."</td>
                <td>".$row['title']."</td>
                <td>".$row['author']."</td>
                <td>".$row['edition']."</td>
                <td>".$row['publisher']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found for the author: $author";
}

mysqli_close($conn);
?>
