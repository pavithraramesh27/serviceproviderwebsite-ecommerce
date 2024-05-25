<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Registernewaccount</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Service Registration</title>
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
    width:85%;
    height: 90%;
    margin: 0 auto;
    padding: 10px;
    box-shadow: 0px 0px 20px #00000010;
    background: #5CB6F9;
    border-radius: 8px;
    margin-bottom: 8px;
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

    margin-left: 15%;
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
  <span><img src="logo.png" class="logo">
</div>
<form method="post" action="homepage.html">

          <div id="heading">
            <h2>Welcome to Service Process Registration</h2>
            <!--<p id="para-div" style="font-size: 15px; font-weight: 500; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 5px;line-height: 1;">    create a new account</p>-->
            </div>

            <div id="container" class="clearfix">
              
            <div class="formgroup">
            <label for="Firstname">Enter your Full Name  :</label>
            <br>
            <input type="text" id="Firstname" name="Firstname">
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
            <label for="avatime">Enter your available Shift:</label>
            <br>
            <select id="Shift" name="Shift" style=" padding: 8px;
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
            <label for="pwd">Enter your Prefered location:</label>
            <br>
            <select id="location" name="location" style=" padding: 8px;
    width: 300px;
    font-size:18px;
    border: 2px solid black;
    margin-top: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    margin-left: 10px;">
            <option value="chennai">Select</option>
            <option value="chennai">Ariyalur</option>
             <option value="chennai">Chengalpattu</option>
             <option value="trichy">Chennai</option>
             <option value="chennai">Coimbatore</option>
             <option value="chennai">Cuddalore</option>
             <option value="chennai">Dharmapuri</option>
             <option value="chennai">Dindigul</option>
             <option value="chennai">Erode</option>
             <option value="chennai">Kallakurichi</option>
             <option value="chennai">Kanchipuram</option>
             <option value="chennai">Kanyakumari</option>
             <option value="chennai">Karur</option>
             <option value="chennai">Krishnagiri</option>
             <option value="chennai">Nagapattinam</option>
             <option value="chennai">Namakkal</option>
             <option value="chennai">Nilgiris</option>
             <option value="chennai">Perambalur</option>
             <option value="chennai">Pudukkottai</option>
             <option value="chennai">Ramanathapuram</option>
             <option value="chennai">Ranipet</option>
             <option value="chennai">Salem</option>
             <option value="chennai">Sivaganga</option>
             <option value="chennai">Tenkasi</option>
             <option value="chennai">Thanjavur</option>
             <option value="chennai">Theni</option>
             <option value="chennai">Thoothukudi</option>
             <option value="chennai">Tiruchirappalli</option>
             <option value="chennai">Tirunelveli</option>
             <option value="chennai">Tirupathur</option>
             <option value="chennai">Tiruppur</option>
             <option value="chennai">Tiruvallur</option>
             <option value="chennai">Tiruvannamalai</option>
             <option value="chennai">Tiruvarur</option>
             <option value="chennai">Vellore</option>
             <option value="chennai">Viluppuram</option>
             <option value="chennai">Virudhunagar</option>
             </select>
            <br>
             <label for="email">Enter your Experience :</label>
            <br>
             <input type="number" id="experience" name="experience">
            <br> 
            <label for="dob">Enter your Date of Birth:</label>
            <br>
            <input type="datetime-local" id="dob" name="dobs">
            <br> 
            <button type="submit" onclick="display();" text-align: center; class="btn-16" action="mam.php">Submit</button>
            </div>

          </div>  
        
    </form>
  </div> 
  <?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $available_time = $_POST['available_time'];
    $preferred_location = $_POST['preferred_location'];

    // Here you can perform validation and sanitization of data
    
    // You should also hash the password before storing it in the database for security
    
    // Example of storing data in a database (you need to create your database and table)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO mam (Firstname, email, pwd, gender, Shift, phone, location, experience, dob)
            VALUES ('$Firstname', '$email', '$pwd', '$gender', '$Shift', '$phone', '$experience', 'dob')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>


