<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    
    $errors = [];


    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }

  
    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }

   
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    
    if (!empty($errors)) {
       
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
      
        echo "<h3>Registration Successful!</h3>";
        echo "<p>Thank you for registering, $firstName $lastName.</p>";
    }
}
?>
