<?php
$servername = "localhost";
$username = "mistry64";
$password = "1BlaCK2boAt!";
$dbname = "mistry64";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productCode = isset($_POST['productCode']) ? $_POST['productCode'] : '';

if (!empty($productCode)) {
    $stmt = $conn->prepare("SELECT productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productCode = ?");
    $stmt->bind_param("s", $productCode);

    $stmt->execute();

    $result = $stmt->get_result();


    $productData = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    echo json_encode($productData);
} else {
    echo "Please enter postalCode";
}
