<?php
$players = array("MS Dhoni", "Virat Kohli", "Rohit Sharma", "Sachin Tendulkar", "Hardik Pandya", "KL Rahul");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #D8BFD8;
            text-align: center;
        }
        div {
            text-align: center;
        }
        table {
            border-spacing: 0;
            width: 350px;
            margin: 20px auto;
            text-align: center;
            border: 4px double black;
        }
        table, th, td {
            border: 1px solid;
        }
        th, td {
            padding: 10px;
            font-size: 16px;
        }
        th {
            background-color: #9400D3;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            background-color: #C71585;
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <h3>Indian Cricket Players Names</h3>
        <table>
            <tr>
                <th>Sl. No.</th>
                <th>Players Name</th>
            </tr>
            <?php
            $sl_no = 1;
            foreach ($players as $player) {
                $row_color = $sl_no % 2 == 0 ? 'style="background-color: #DDA0DD;"' : 'style="background-color: #ffffff;"';
                echo "<tr $row_color>
                        <td>$sl_no</td>
                        <td>$player</td>
                      </tr>";
                $sl_no++;
            }
            ?>
        </table>
    </div>
</body>
</html>
