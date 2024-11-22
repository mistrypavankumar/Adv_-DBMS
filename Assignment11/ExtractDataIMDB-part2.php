<?php
// Name: Pavan Kumar Mistry
// Date: 25 Nov, 2023

require 'simple_html_dom.php';

// step-1: setup database connection
$servername = "localhost";
$username = "mistry64";
$password = "1BlaCK2boAt!";
$dbname = "mistry64";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Unable to connect" . $conn->connect_error);
} else {
    echo "Connected successfully!";
}


if (isset($_GET['search'])) {
    $imdbUrl = $_GET['search'];

    $html = file_get_html($imdbUrl);

    $title = $html->find('title', 0)->plaintext;
    $description = $html->find('meta[name=description]', 0)->content;

    $stmt = $conn->prepare("INSERT INTO ImdbDataExtract (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    $stmt->execute();
    echo "New records created successfully";

    header("Location: http://elvis.rowan.edu/~mistry64/AdvancedDatabases/Assignment11/ExtractDataIMDB-part2.php");
    $stmt->close();
    $conn->close();
} else {
    echo "No search query provided";
}

$result = $conn->query("SELECT id, title, description FROM ImdbDataExtract");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB</title>

    <style>
        table {
            width: 60%;
            margin: 100px auto;
            height: auto;
            border: 2px solid black;
        }
    </style>
</head>

<body>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }

        ?>
    </table>
</body>

</html>