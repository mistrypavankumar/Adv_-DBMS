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

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main {
            width: 70%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div {
            width: 50%;
            height: 80vh;
            overflow: scroll;
        }

        table {
            width: 100%;
            height: 50vh;
            margin-top: 20px;
            background-color: white;
            border-collapse: collapse;
            border-color: rgba(0, 0, 0, 0.2);
            overflow-y: hidden;
        }

        th,
        td {
            padding: 12px;
        }

        th {
            position: static;
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
        <div>
            <?php
            $sql = "SELECT state, COUNT(customerName) AS totalCustomers FROM customers GROUP BY state";
            $result = $conn->query($sql);

            echo "<table border='1' style='border-collapse: collapse;'>
        <tr>
        <th>State</th>
        <th>Total Customers</th>
        </tr>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td><a href = 'customersbystate.php?state=" . $row['state'] . "'>" . $row["state"] . "</td><td>" . $row["totalCustomers"] . "</td></tr>";
                }
            }

            echo "</table>";
            ?>

        </div>
    </main>
</body>

</html>