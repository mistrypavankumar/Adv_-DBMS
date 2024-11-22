<?php

// Name: Pavan Kumar Mistry
// Date: 19-11-2023 


$servername = "localhost";
$username = "mistry64";
$password = "1BlaCK2boAt!";
$dbname = "mistry64";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        main {
            width: 70%;
            height: 100vh;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table {
            width: 100%;
            background-color: white;
            border-color: rgba(0, 0, 0, 0.2);
        }

        td,
        th {
            padding: 12px;
        }

        th {
            background-color: #943be3;
            color: #fff;
        }

        tr:hover {
            background-color: rgba(148, 59, 227, 0.1);
        }
    </style>
</head>

<body>
    <main>


        <?php
        $sql = "select customerNumber, customerName, phone, addressLine1, city, state, postalCode, country from customers where state = '" . $_GET["state"] . "'";
        $result = $conn->query($sql);

        echo "<table border='1' style='border-collapse: collapse;'>
        <tr>
            <th>CustomerNumber</th>
            <th>CustomerName</th>
            <th>Contact</th>
            <th>AddressLine1</th>
            <th>City</th>
            <th>State</th>
            <th>PostalCode</th>
            <th>Country</th>
        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <td>" . $row["customerNumber"] . "</td>
            <td>" . $row["customerName"] . "</td>
            <td>" . $row["phone"] . "</td>
            <td>" . $row["addressLine1"] . "</td>
            <td>" . $row["city"] . "</td>
            <td>" . $row["state"] . "</td>
            <td>" . $row["postalCode"] . "</td>
            <td>" . $row["country"] . "</td>
            </tr>";
            }
        } else {
            "less";
        }


        ?>
    </main>
</body>

</html>