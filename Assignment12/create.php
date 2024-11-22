<!-- Name: Pavan Kumar Mistry -->
<!-- Date: 03-12-2023 -->

<?php
$servername = "localhost";
$username = "mistry64";
$password = "1BlaCK2boAt!";
$dbname = "mistry64";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];

    // Prepare SQL statement
    $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssiidd",
        $productCode,
        $productName,
        $productLine,
        $productScale,
        $productVendor,
        $productDescription,
        $quantityInStock,
        $buyPrice,
        $MSRP
    );

    if ($stmt->execute()) {
        echo "Inserted Successfully";
    } else {
        echo "Insert Failed: " . $stmt->error;
    };

    $stmt->close();
} else {
    echo "No POST data received";
}

$conn->close();
?>