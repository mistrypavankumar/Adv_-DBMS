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
    $searchString = $conn->real_escape_string($_POST['searchString']);

    $sql = "SELECT productCode, productName, productDescription FROM products WHERE productCode LIKE ? OR productName LIKE ? OR productDescription LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $searchString . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Product Code</th><th>Product Name</th><th>Product Description</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["productCode"] . "</td><td>" . $row["productName"] . "</td><td>" . $row["productDescription"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $stmt->close();
} else {
    echo "No search string received";
}

$conn->close();
