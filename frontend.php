<!DOCTYPE html>
<html lang="en">
<head>
<title>SERVESASE</title>
<head>
<body>
<style>
*{margin:20;
  padding:20;
}</style>
<style>
.main{
width:100%;
background-color:black;
</style>
<div class="main">
  <style>
.navbar{
width:1200px;
height:75px;
margin:auto;
}</style>
  <div class="navbar">
<navbar>
<style>
.icon{
width:200px;
float:left;
height:70px;
color:white;
}
</style>
     <div class="icon">
        <h2 class ="logo">serveease</h2>
        </div>
<style>
.menu{
width:400px;
float:left;
height:60px;
}
ul{
float:left;
display:flex;
justify-content:center;
align-items:center;
}
ul li{
list-style:none;
margin-left:65px;
margin-top:2px;
font-size:30px;
}
ul li{
text-decoration:none;
color:white;
font-family:Arial;
font-weight:bold;
transition:0.4s ease-in-out;
}
</style>

     <div class="menu">
      <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">AboutUs</a></li>
      <li><a href="#">Account</a></li>
      </div>
<style>
.search{
width:330px;
float:left;
margin-left:270px;
}
.srch{
font-family:'Times New Roman';
width:200px;
height:40px;
background:transparent;
border:1px;
margin-top:13px;
color:blue
border-right:auto;
font-size:16px;
float:left;
padding:10px;
border radius:25px 25px 25px 25px;
}
</style>
</navbar><br><br><br><br><br>
<div class="search">
<input class="srch" type="search" name="search" placeholder="Type To Text">
<style>
.btn{
width:100px;
height:40px;
backgrond:white;
border:2x;
margin-top:13px;
color:black;
font-size:15px;
border-bottom-right-radius:5px;
border-bottom-right-radius:5px;
}
</style>
<a href="#"><button class="btn" type="search" name="search">Search</button></a>
</div> 
</form>
<?php
// Database connection configuration
$db_host = "localhost";
$db_name = "customer1"; // Your database name
$db_user = "root";
$db_password ="";

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['area'])) {
        $area = $_GET['area'];

        // Fetch profile picture information based on the specified area
        $stmt = $pdo->prepare("SELECT profile_pic FROM users1 WHERE area LIKE :area ORDER BY created_at DESC LIMIT 1");
        $stmt->bindValue(':area', '%' . $area . '%', PDO::PARAM_STR);
        $stmt->execute();
        $profileInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($profileInfo) {
            $profilePic = $profileInfo['profile_pic'];
            $filePath = 'C:/Users/Admin/Desktop/profile_pics/' . $profilePic;

            echo "<h2>Your Profile Picture:</h2>";
            echo "<img src='$filePath' alt='Profile Picture' style='width: 150px; height: 150px;'>";
        } else {
            echo "No profile picture found for the specified area.";
        }
    }

    // Display top-rated plumbers
    $topRatedStmt = $pdo->query("SELECT first_name, last_name, area FROM users1 ORDER BY rating DESC LIMIT 5");
    $topRatedPlumbers = $topRatedStmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($topRatedPlumbers)) {
        echo "<h2>Top Rated Plumbers:</h2>";
        echo "<ul>";
        foreach ($topRatedPlumbers as $plumber) {
            echo "<li>{$plumber['first_name']} {$plumber['last_name']} - {$plumber['area']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No top-rated plumbers found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</body>
</head>