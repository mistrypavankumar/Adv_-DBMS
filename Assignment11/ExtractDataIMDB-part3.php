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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $ImdbUrl = $_POST['search'];

        $html = file_get_html($ImdbUrl);

        $title = $html->find("title", 0)->plaintext;
        $description = $html->find('meta[name=description]', 0)->content;

        $links = $html->find('a');

        $stmt = $conn->prepare("INSERT INTO ImdbLinks (url) VALUES (?)");

        foreach ($links as $link) {
            $url = $link->href;
            $stmt->bind_param('s', $url);
            $stmt->execute();
        }

        header("Location: http://elvis.rowan.edu/~mistry64/AdvancedDatabases/Assignment11/ExtractDataIMDB-part3.php");

        $stmt->close();
        $conn->close();
    }
}

$result = $conn->query("SELECT linkId, url FROM ImdbLinks");
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

        form {
            display: flex;
            align-items: center;
            width: 40%;
            margin: 0 auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 7px 7px;
            border: 2px solid rgba(0, 0, 0, 0.2);
            outline: none;

        }

        input[type="submit"] {
            padding: 8px 2px;
            width: 200px;
            background-color: blue;
            color: white;
            border: none;
            transition: 0.4s ease;

        }

        input[type="submit"]:hover {
            background-color: darkblue;
        }
    </style>
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        IMDb URL: <input type="text" name="search" placeholder="Enter the url of IMDB">
        <input type="submit" value="Submit">
    </form>

    <table border="1">
        <tr>
            <th>LinkId</th>
            <th>Url</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["linkId"] ?></td>
                    <td><?php echo $row["url"] ?></td>
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