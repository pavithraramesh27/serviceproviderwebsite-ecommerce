/blackbox
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Website</title>
</head>
<body>
    <h1>Product Catalog</h1>
    <ul>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "appdata");
        $result = mysqli_query($conn, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='product.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></li>";
        }
        mysqli_close($conn);
        ?>
    </ul>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "test");
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    echo "<h1>" . $row["name"] . "</h1>";
    echo "<p>" . $row["description"] . "</p>";
    echo "<p>Price: $" . $row["price"] . "</p>";
    mysqli_close($conn);
    ?>
</body>
</html>
