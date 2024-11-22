<!-- 
    Name: Pavan Kumar Mistry
    Date: 03-12-2023
-->

<?php
$servername = "localhost";
$username = "mistry64";
$password = "1BlaCK2boAt!";
$dbname = "mistry64";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productCode = $conn->real_escape_string($_POST['productCode']);

    $stmt = $conn->prepare("DELETE FROM products WHERE productCode = ?");
    $stmt->bind_param("s", $productCode);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No POST data received";
}

$conn->close();
?>