<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homepage</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    </head>
    <body>

<div id="wrapp-class">

<nav>
       <div class="logo">
        <span><img src="newlogo.jpeg" class="logo">
        <!--- <p style="color: white; font-weight: 400;font-size: 14px; font-family:cursive;">BookEaze</p></span>  --> 
        </div>

        <p style="color: #F2F0FC; font-family:HK grotesk; font-size:17px;">ServEaze</p></span>
        <ul>
        <li><i class="fa-solid fa-house fa-lg" ></i><a href="homepage.php">  Home</a></li>
        <li><i class="fa-solid fa-handshake-simple fa-lg" ></i><a href="Aboutus.html">  About Us</a></li>
        <li><i class="fa-solid fa-briefcase fa-lg" ></i><a href="services.html">  Services</a></li>
        <li><i class="fa-solid fa-bell fa-lg" ></i><a href="notification.html">  Notification</a></li>
        <li><i class="fa-solid fa-user fa-lg" ></i><a href="account.html">  Account</a></li>
        </ul> 

       <img src="user.png" class="userpic" onclick="toggleMenu()">
       <div class="sub-menu-wrap" id="submenu">
            <div class="sub-menu">
                <div class="user-info">
                <img src="user.png" >
                <h2>User name</h2>
                </div>
                <hr>
    <a href="editprofile.html" class="submenu-link">
        <i class="fa-solid fa-user-pen fa-lg" style=" color:#FEFCFF;"></i>
        <p>Edit Profile</p>
        <span></span>
    </a>

    <a href="uploadimg.html" class="submenu-link">
        <i class="fa-regular fa-image fa-lg" style=" color:#FEFCFF;"></i>
        <p>Upload Photo</p>
        <span></span>
    </a>

    <a href="#" class="submenu-link">
        <i class="fa-solid fa-location-dot fa-lg" style=" color:#FEFCFF;"></i>
        <p>Change Location</p>
        <span></span>
    </a>

    
    <a href="helpsupport.html" class="submenu-link">
        <i class="fa-solid fa-headset fa-lg" style=" color:#FEFCFF;"></i>
        <p>Help & Support</p>
        <span></span>
    </a>

    <a href="logout.php" class="submenu-link">
        <i class="fa-solid fa-right-from-bracket fa-lg" style=" color:#FEFCFF;"></i>
        <p>Logout</p>
        <span></span>
    </a>
    </div>
    </div>
</nav>

 <div id="main-div2" class="clearfix">
        <div id="head" >
            <p>welcome user</p>
        </div>

            <div id="search">
                 <input type="text" id="searchTerm" onkeyup="myFunction()" placeholder="    Search Service Here" title="Type in a category">
                <ul id="myMenu" class="hidden">
                <li><a href="#">Electrician</a></li>
                <li><a href="#">Plumber</a></li>
                <li><a href="#">Ro water</a></li>
                <li><a href="#">AC mechanic</a></li>
                <li><a href="#">Refrigerator mechanic</a></li>
                <li><a href="#">Tv Technician</a></li>
                <li><a href="#">Painter</a></li>
                <li><a href="#">Carpenter</a></li>
                <li><a href="#">appliance Repair Technician</a></li>
                </ul>
                <button type="submit" class="searchButton">
                  <i class="fa fa-search" style="color:#eee;"></i>
               </button>
            </div>
        <div class="cart" id="cart">
             <h3>Book Service</h3>
             <ul id="cart-items"></ul>
        <p style="font-size: 14px; font-weight:600;padding-top:9px">Total: Rs.<span id="cart-total">0.00</span></p>
        </div>   
    </div>
    
    <main id="product-container">
        <?php
        // Simulated product data from a MySQL database
        $conn = new mysqli('localhost', 'root', '', 'appdata');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM products LIMIT 20");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<h2>' . $row['productname'] . '</h2>';
                echo '<p>' . $row['productdesc'] . '.<br> Price: Rs.' . $row['cost'] . '</p><br>';
                echo '<button onclick="addToCart(\'' . $row['productname'] . '\', ' . $row['cost'].')">Add Service</button>';
                echo '</div>';
            }
        }

        $conn->close();
        ?>
   </main>
    </div>

        <footer>
        <div class="footerLeft">
            <div class="footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="fList">
                    <li class="fListItem">Company</li>
                    <li class="fListItem">Contact</li>
                    <li class="fListItem">Careers</li>
                    <li class="fListItem">Affiliates</li>
                    <li class="fListItem">Services</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="fList">
                    <li class="fListItem">Support</li>
                    <li class="fListItem">Refund</li>
                    <li class="fListItem">FAQ</li>
                    <li class="fListItem">Feedback</li>
                    <li class="fListItem">Stories</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Services</h1>
                <ul class="fList">
                    <li class="fListItem">AC Technician</li>
                    <li class="fListItem">Plumber</li>
                    <li class="fListItem">Electrician</li>
                    <li class="fListItem">Painter</li>
                    <li class="fListItem">Carpenter</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@email.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Follow Us</h1>
                <div class="fIcons">
                    <i class="fa-brands fa-twitter" style="color: #0d0d0d;"><span style="font-size: 15px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">   Twitter</span></i>
                    <br>
                    <i class="fa-brands fa-instagram" style="color: #121212;"><span style="font-size: 15px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">   Instagram</span></i>
                    <br>
                    <i class="fa-brands fa-facebook" style="color: #141415;"><span style="font-size: 15px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">  Facebook</span></i>
                  </div>
            </div>
            <div class="footerRightMenu">
                <span class="copyright">@ServEaze. All rights reserved. 2024.</span>
            </div>
        </div>
    </footer>
</div>   
 

   <script src="script.js"></script>
    <script>
        // Your JavaScript code here
        let cartItems = [];
        let cartTotal = 0;

        // Function to add a product to the cart
        function addToCart(productName, price) {
            const existingItem = cartItems.find(item => item.productName === productName);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({ productName, price, quantity: 1 });
            }

            updateCart();
        }

        // Function to update the cart
        function updateCart() {
            const cartList = document.getElementById('cart-items');
            const totalElement = document.getElementById('cart-total');

            cartList.innerHTML = '';
            cartTotal = 0;

            cartItems.forEach(item => {
                const listItem = document.createElement('li');
                listItem.textContent = `${item.productName} - Rs.${(item.price * item.quantity).toFixed(2)} x ${item.quantity}`;
                cartList.appendChild(listItem);

                cartTotal += item.price * item.quantity;
            });

            totalElement.textContent = cartTotal.toFixed(2);
        }
    </script>

</body>
</html>
