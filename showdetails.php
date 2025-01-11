<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>
<body>
<a href="input.html"><button>Home</button></a><br><br>
<table style="border: 2px solid black;">
        <tr>
	<th>ID</th>
	<th>Name</th>
	<th>Course</th>
	<th>Age</th>
	<th>Email</th>
	<th>Phone</th>

</tr>
<?php
     $con=new mysqli('localhost','root','','studentsinfo');
     if ($con->connect_error) {
         die("Failed".$con->connect_error);
     }
     
          $q="select * from studentsdata";
          $rs=mysqli_query($con,$q)or die("Wrong Query");
          while($row=mysqli_fetch_assoc($rs)){
                echo "<tr>"
		echo "<td>".$row['id']."</td>
                echo "<td>".$row['name']."</td>"
		echo "<td>".$row['course']."</td>"
		echo "<td>".$row['age']."</td>"
		echo "<td>".$row['email']."</td>"
                echo "<td>".$row['phone']."</td>"
		echo "</tr>";
          }
?>
</table>
</body>
</html>