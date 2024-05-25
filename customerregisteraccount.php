<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO customer (firstname,lastname, pwd, email,curlocation,dob,mobnum) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstname,$lastname, $pwd, $email, $curlocation,$dob,$mobnum);

    // Collect form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT); // Hash password for security
    $email = $_POST['email'];
    $curlocation = $_POST['curlocation'];
    $dob = $_POST['dob'];
    $mobnum =$_POST['mobnum'];

    // Execute prepared statement
if ($stmt->execute()) {
  echo "New record created successfully";
  header("Location: homepage.php");
  exit;

}

else {
  echo "Error: " . $stmt->error;
}

$stmt->close();

// Close connection
$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Registernewaccount</title>
    <style type="text/css">

  *{
      margin:0px;
      padding:0px;
      box-sizing:border-box;

  }

#wrapp-class
{
    width:100%;
    margin: auto;
}


body {
background-image: url("newbg4.png");
background-position: center; 
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed; 
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.clearfix::after
{
    content: "";
    display: block;
    clear: both;
}

  #logo-div{
    width:100%;
    height:40px;
    margin-top: 10px;
  }

  #heading{
    width: 100%;
    height: 30px;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    font-family:'Georgia';
    color:#232425;
    padding-top: 0px;
    padding-bottom: 10px;
    margin-bottom: 15px;
    font-family: Georgia, 'Times New Roman', Times, serif;
  }
 

#container{
    width:75%;
    height: 65%;
    margin: 0 auto;
    padding: 10px;
    box-shadow: 0px 0px 20px #00000010;
    background: #172E4A;
    border-radius: 8px;
    margin-bottom: 10px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

#container .formgroup
{
    width: 35%;
    height: 400px;
   /* background-color: aqua;*/
    float: left;
    margin-bottom: 10px;
    margin-left: 30px;
    margin-right: 30px;
    margin-top: 15px;
}

#container .formgroup:nth-child(2)
{

    margin-left: 10%;
    margin-right: 10%;
}

.formgroup label{
    width: 40%;
    font-size: 18px;
    margin-top: 10px;
    font-weight: 500;
    font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
    padding-top: 10px;
    padding-bottom: 15px;
    margin-left: 10px;
    color:#F3F5F9;
}

.formgroup input{
    padding: 8px;
    width: 300px;
    font-size:18px;
    border: 2px solid black;
    margin-top: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    margin-left: 10px;
}


button {
  margin: 25px;
  font-size: 18px;
  font-family: Georgia, 'Times New Roman', Times, serif;
  font-weight: 600;
  border-radius: 8px;
  border: 8px solid rgba(211, 211, 211, 0.565);
  background: #001220;
}


.btn-16 {
  width: 110px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}


.btn-16 {
  border: none;
  color: #000;
  background: #CAE8FF;
}


.btn-16:after {
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  left: 0;
  direction: rtl;
  z-index: -1;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001;
  transition: all 0.3s ease;
}

.btn-16:hover {
  color: #000;
}

.btn-16:hover:after {
  left: auto;
  right: 0;
  width: 100%;
}

.btn-16:active {
  top: 2px;
}

.logo{
    width: 60px;
    border-radius: 50%;
    cursor: pointer;
    margin-right:10px;
    margin-left: 2%;
}
    
</style>
</head>
<body> 
  <div class="wrapp-class">
<div id="logo-div" class="logo">
  <span><img src="newlogo.jpeg" class="logo">
</div>
<form method="post" action="customerregisteraccount.php">

          <div id="heading">
            <h2>Welcome to ServEaze</h2>
            <!--<p id="para-div" style="font-size: 15px; font-weight: 500; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 5px;line-height: 1;">    create a new account</p>-->
            </div>

            <div id="container" class="clearfix">
             <p style="font-size: 24px; font-weight: 500; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS',   sans-serif; margin-top: 10px;margin-bottom:10px;text-align:center;color:#F3F5F9;">Create account as Customer to Login</p>
            <div class="formgroup">
            <label for="firstname">Enter your First Name  :</label>
            <br>
            <input type="text" id="firstname" name="firstname">
            <br>
            <label for="lastname" >Enter your Last Name  :</label>
            <br>
            <input type="text" id="lastname" name="lastname">
            <br>
            <label for="email">Enter your email :</label>
            <br>
            <input type="email" id="email" name="email"> 
            <br>
            <label for="pwd">Enter your Password :</label>
            <br>
            <input type="password" pattern="[a-z,0-9]{8,}" required id="pwd" name="pwd">          
          </div>


          <div class="formgroup">
            <label for="curlocation">Enter your Location:</label>
            <br>
            <select id="curlocation" name="curlocation" style=" padding: 8px;
            width: 300px;
            font-size:18px;
            border: 2px solid black;
            margin-top: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            margin-left: 10px;">
                    <option value="chennai">Chennai</option>
                     <option value="chennai">madurai</option>
                     <option value="trichy">trichy</option>
                    </select>
            <br> 
            <label for="mobnum">Enter your Mobile Number:</label>
            <br>
            <input type="text" required id="mobnum" name="mobnum">
            <br>
            <label for="dob">Enter your Date of Birth:</label>
            <br>
            <input type="date" id="dob" name="dob" value="2017-06-01">
            <br> 
            <button type="submit" onclick="display();"; class="btn-16">Submit</button>
            </div>
          </div>     
    </form>
  </div> 
</body>
</html>