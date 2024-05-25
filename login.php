<?php
session_start();
//customer login page
$alertMessage = "";

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "appdata";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM userlogin WHERE username = ? AND password = ?");
    if (!$stmt) {
        $alertMessage = "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("ss", $username, $password);

        if (!$stmt->execute()) {
            $alertMessage = "Error executing statement: " . $stmt->error;
        } else {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                header('Location: dashboard.php');
                exit;
            } else {
                $alertMessage = "Invalid Login. Please try again.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles.css">
  </head>
<body>
<script>
        // Display the alert message using JavaScript
        <?php if (!empty($alertMessage)) { ?>
            alert("<?php echo $alertMessage; ?>");
        <?php } ?>
    </script>
     <div class="login-container">

<div class="login-head">
<h2>LOGIN</h2>
</div>
<form id="loginForm"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <span><i class="fa-solid fa-user" style="color: #181616;"></i><label for="username"> Username:</label></span>
  <br>
  <input type="text" id="username" name="username" required>
  <span><i class="fa-solid fa-lock" style="color: #0f0f0f;"></i>
  <label for="password">Password:</label></span><br>
  <input type="password" id="password" name="password" required>

  <div class="button-container">
  <input type="submit" id="signin-button" class="signin-button" value="Sign in" onclick="showAlert()">
  <!--onclick="login()"
  <button class="sigin-button" type="button" onclick="login()"><span>Sign in</span></button>--> 
</div>

<div class="forget-account">
 <a href="forgetpassword.html"><p>forget Password?</p></a>
</div>
 <div class="new-account">
   <P>Don’t have an account ?<a href="registeraccount.html" ><u>click here</u></a></p>
    </div>
</form>
</div>
</div>
</body>
</html>
