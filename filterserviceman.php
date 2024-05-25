<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Simple email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please enter a valid email address.";
    } 
    
    else {
        // Simple password length validation
        if (strlen($password) < 8) {
            echo "Password should be at least 8 characters long.";
        } 
        
        else {
            // Account creation logic (for example, you might insert data into a database)
            // For simplicity, let's just echo the submitted values
            echo "Account created successfully!<br>";
            echo "First Name: $first_name<br>";
            echo "Last Name: $last_name<br>";
            echo "Email: $email<br>";
        }
    }
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Create Account">
</form>

</body>
</html>