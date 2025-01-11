<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <style>
        body {
            font-family: italic 1.2rem "Fira Sans", serif;
            background-color: red;
            padding: 20px;
        }
        .container {
            max-width: 570px;
            margin: auto;
            background-color: #bff4ed;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 50px;
            margin-bottom: 20px;
            color: #e40475;  
        }
        label {
            font-size: 20px;
        }
        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #7fda89;
        
        }
        .result {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            padding: 20px;
            background-color: #be3144;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            text-align: center;
            box-sizing: border-box;  
            font-size: 24px; 
        }
        #calculate-button {
            font-family: italic 1.2rem "Fira Sans", serif;
            width: 50%; 
            margin: 10px auto;
            display: block; 
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #0155cd;
            color: white;
}
    </style>
</head>
<body>

<div class="container">
    <h1>Electricity Bill Calculator</h1>
    
    <form method="post">
        <label for="consumer_name">Consumer Name:</label>
        <input type="text" name="consumer_name" id="consumer_name" 
               value="<?php if(isset($_POST['consumer_name'])) echo $_POST['consumer_name']; ?>" required>

        <label for="consumer_id">Consumer ID:</label>
        <input type="text" name="consumer_id" id="consumer_id" 
               value="<?php if(isset($_POST['consumer_id'])) echo $_POST['consumer_id']; ?>" required>
        
        <label for="units">Enter Units Consumed:</label>
        <input type="number" name="units" id="units" 
               value="<?php if(isset($_POST['units'])) echo $_POST['units']; ?>" required>
        <br><br>
        <input type="submit" name="calculate" id="calculate-button" value="Calculate Bill">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
        $consumer_name = htmlspecialchars($_POST['consumer_name']);
        $consumer_id = htmlspecialchars($_POST['consumer_id']);
        $units = $_POST['units'];
        $bill = 0;

        if ($units <= 100) {
            $bill = $units * 5;
        } elseif ($units <= 200) {
            $bill = (100 * 5) + (($units - 100) * 7.5); 
        } else {
            $bill = (100 * 5) + (100 * 7.5) + (($units - 200) * 10); 
        }

        echo "<div class='result'>
                <p><strong>Consumer Name:</strong> $consumer_name</p>
                <p><strong>Consumer ID:</strong> $consumer_id</p>
                <p><strong>Total Bill:</strong> Rs. " . number_format($bill, 2) . "</p>
              </div>";
    }
    ?>
</div>

</body>
</html>
