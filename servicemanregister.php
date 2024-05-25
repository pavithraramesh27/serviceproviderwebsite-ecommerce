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
    $stmt = $conn->prepare("INSERT INTO serviceman (full_name, pwd, email, preferred_location, available_time, gender, dob,phone,experience) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("sssssssss", $full_name, $pwd, $email, $preferred_location, $available_time, $gender, $dob,$phone,$experience);

    // Collect form data
    $full_name = $_POST['full_name'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT); // Hash password for security
    $email = $_POST['email'];
    $preferred_location = $_POST['preferred_location'];
    $available_time = $_POST['available_time'];
    $gender = $_POST['gender'];
    $phone =$_POST['phone'];
    $experience=$_POST['experience'];
    $dob=$_POST['dob'];

   
   // Execute prepared statement
if ($stmt->execute()) {
  echo "New record created successfully";
  header("Location: homepage.php");
  exit;
} else {
  echo "Error: " . $stmt->error;
}


    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
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
    width:50%;
    height:40px;
    margin-top: 10px;
  }

  #heading{
    width: 50%;
    height: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    font-family:'Georgia';
    color:#232425;
    font-family: Georgia, 'Times New Roman', Times, serif;
    margin-bottom:5px;
  }
 

#container{
    width:80%;
    height: 90%;
    margin: 0 auto;
    padding: 10px;
    box-shadow: 0px 0px 20px #00000010;
    background: #172E4A;
    border-radius: 8px;
    margin-bottom: 8px;
    margin-top:30px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

#container .formgroup
{
    width: 35%;
    height: 450px;
   /* background-color: aqua;*/
    float: left;
    margin-bottom: 10px;
    margin-left: 70px;
    margin-right: 10px;
    margin-top: 15px;
}

#container .formgroup:nth-child(2)
{

    margin-left: 10%;
    margin-right: 5%;
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
    color: #fff;
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
  <div id="container1" class="clearfix">
     <div id="logo-div" class="logo">
       <span><img src="newlogo.jpeg" class="logo">
      </div>
         <div id="heading">
            <h2>Welcome to ServEaze</h2>
            <!--<p id="para-div" style="font-size: 15px; font-weight: 500; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 5px;line-height: 1;">    create a new account</p>-->
            </div>
</div>
<form method="post" action="servicemanregister.php">

            <div id="container" class="clearfix">
            <p style="font-size: 25px; font-weight: 500; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 10px;margin-bottom:10px;text-align:center;color:#F3F5F9;">Create account as Serviceman to Login</p>
            <div class="formgroup">
            <label for="full_name">Enter your Full Name  :</label>
            <br>
            <input type="text" id="full_name" name="full_name">
            <br>
            <label for="email">Enter your email :</label>
            <br>
            <input type="email" id="email" name="email"> 
            <br>
            <label for="pwd">Enter your Password :</label>
            <br>
            <input type="password" pattern="[a-z,0-9]{8,}" required id="pwd" name="pwd">
            <br>
            <label for="gender">Enter your Gender :</label>
            <br>
            <input type="text" id="gender" name="gender">
            <br>
            <label for="available_time">Enter your available Time:</label>
            <br>
            <select id="available_time" name="available_time" style=" padding: 8px;
    width: 300px;
    font-size:18px;
    border: 2px solid black;
    margin-top: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    margin-left: 10px;">
     <option value="chennai">Select</option>
      <option value="chennai">Morning</option>
      <option value="chennai">Evening</option>
      <option value="chennai">Full Time</option>
            </select><br>
           
          
                
          </div>


          <div class="formgroup">
            <label for="phone">Enter your mobile number:</label>
            <br>
            <input type="text" id="phone" name="phone">
            <br> 
            <label for="preferred_location">Enter your Prefered location:</label>
            <br>
            <select id="preferred_location" name="preferred_location" style=" padding: 8px;
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
             <label for="experience">Enter your Experience :</label>
            <br>
             <input type="number" id="experience" name="experience">
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
