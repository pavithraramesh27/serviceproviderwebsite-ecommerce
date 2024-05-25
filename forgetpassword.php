
<?php

// Function to generate a random verification code
function generateVerificationCode($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// Function to send an email with the verification code
function sendVerificationCode($email, $code) {
    $subject = "Password Reset Verification Code";
    $message = "Your verification code is: $code";
    // Use a proper mail function or library to send the email
    mail($email, $subject, $message);
}

// Initialize variables
$email = $verificationCode = $verificationError = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Code button clicked
    if (isset($_POST["get_code"])) {
        $email = $_POST["email"];

        // Generate a verification code
        $verificationCode = generateVerificationCode();

        // Save the verification code in a secure way (e.g., database) for later verification
        // For simplicity, we'll just store it in a session variable here
        session_start();
        $_SESSION["verification_code"] = $verificationCode;

        // Send the verification code to the user's email
        sendVerificationCode($email, $verificationCode);

        // Display a success message
        echo "Verification code sent successfully!";
    }

    // Verify button clicked
    elseif (isset($_POST["verify"])) {
        $verificationCode = $_POST["verification_code"];

        // Retrieve the saved verification code (from session, database, etc.)
        session_start();
        $savedCode = isset($_SESSION["verification_code"]) ? $_SESSION["verification_code"] : null;

        // Verify the entered code
        if ($savedCode && $verificationCode == $savedCode) {
            // Code is valid, allow the user to reset the password or perform account recovery
            // Display a success message or redirect the user to the password reset page
            echo "Verification successful! Now you can reset your password.";
            header("Location: resetpassword.html");
exit;
        } else {
            // Code is invalid, display an error message
            $verificationError = "Invalid verification code. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>forgetpassword</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style type="text/css">

  *{
      margin:0px;
      padding:0px;
      box-sizing:border-box;
      font-family: Georgia, 'Times New Roman', Times, serif;
  }

  body {
background-image: url("forgetpassword.png");
background-position: center; 
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed; }

  #logo-div{
    width:100%;
    min-height:60px;
  }

  #heading{
    width: 100%;
    min-height: 100px;
    text-align: center;
    padding: 10px;
    font-size: 35px;
    font-weight: 600;
    font-family: Georgia, 'Times New Roman', Times, serif;
    line-height: 1.2;
    color: #252323;
    padding-top: 40px;
    margin-bottom: 10px;
  }

  #para-div{
    width: 100%;
    height: 105px;
    color: black;
    font-size: 28px; 
    font-weight: 500;
    word-wrap: break-word;
    text-align:center;
    padding-left: 40px;
    padding-right: 40px;
    line-height: 1.2;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }

  #input-container1{
    width: 100%;
    height: 90px;
    text-align:center;
    line-height: 1;
  }

  #input-container2{
    width: 100%;
    height: 90px;
    text-align:center;
    line-height: 1;
  }

  label{
    padding-right: 190px;
    font-size: 19px;
    font-weight: 500;
    margin-top: 10px;
    line-height: 1;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
  }

  #emailname{
   
    font-size: 15px;
    font-weight: 500;
    width: 20%;
  }

  #verification_code{
    padding-right: 100px;
    font-size: 15px;
    font-weight: 500;
    width: 20%;
  }

  input[type="text"]{
    width: 20%;
    padding: 13px;
    box-sizing: border-box;
    border-radius:14px;
    background-color:#e3edf8;
    color: #0c0c0c;
    border:#D183E6;
    margin-bottom: 20px;
    margin-top: 20px;
  }

  input[type="email"]{
    width: 20%;
    padding: 13px;
    box-sizing: border-box;
    border-radius:14px;
    background-color:#e3edf8;
    border:#A5ADFF;
    margin-bottom: 20px;
    margin-top: 20px;
  }

  input[type="text"]::placeholder{
    color:#0c0c0c;
    font-size: 13px;
   
  }

  input[type="email"]::placeholder{
    color:#0c0c0c;
    font-size: 13px;
  }
 
  #codeverify{
    width: 100%;
    height: 100px;
    text-align:center;
    padding-left: 10px;
    padding-right: 10px;
  }

  button{
    width: 110px;
    padding: 13px;
    min-height: 30px;
    background-color: #001220;
    border-radius: 14px;
    border: #A5ADFF;
    font-size: 16px;
    font-weight: 600;
    margin-top: 15px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  }

  
  .get_code {
  width: 130px;
  height: 40px;
  color: #e3edf8;
  border-radius: 15px;
  padding: 10px 25px;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;;
  font-weight: 600;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255, 255, 255, 0.69),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
  border: 4px solid #a5adff;
}

.verifybutton {
  width: 130px;
  height: 40px;
  color: #252323;
  border-radius: 15px;
  padding: 10px 25px;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: 600;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255, 255, 255, 0.732),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
   border: 4px solid #a5adff;
  outline: none;
}
  .get_code {
  background:#001220;
  border: none; 
}

.verifybutton {
  background:#001220;
  background:#001220;
  color: #e3edf8;
  border: none;}

.get_code:before {
  height: 0%;
  width: 2px;
}

.verifybutton:before {
  height: 0%;
  width: 2px;
}

.get_code:hover {
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .5), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
}

  
.verifybutton:hover {
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .5), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
}

  
</style>
    </head>
<body> 
<form method="post">
    <div id="logo-div"></div>
    <div id="heading" >Forget your <br>Password ?</div>

    <div id="para-div">Enter your email to<br> get the verification code </div>

    <div id="input-container1" >
      <span><i class="fa-solid fa-envelope fa-xl" style="color: #0f0f0f;"></i>
      <label id="email" for="email"> Enter email</label></span><br>
      <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="enter email here" required>
    </div>

      <div id="input-container2">
        <span><i class="fa-solid fa-user-lock fa-xl" style="color: #1a1a1a;"></i>
      <label id="code" for="code"> Enter code</label></span><br>
      <input type="text"  id="verification_code" name="verification_code" value="<?php echo htmlspecialchars($verificationCode); ?>"  placeholder="enter code here" required>
      </div>

    <div id="codeverify">
    <button type="submit" class="get_code" name="get_code">Get Code</button>
      <a href="resetpassword.html"><button type="submit" class="verifybutton" name="verify">Verify</button></a> 
    </div>
    <p style="color: red;"><?php echo $verificationError; ?></p>
</form>
    </body>
    </html>