<?php

// Name: Pavan Kumar Mistry
// Date: 25 Nov, 2023

require 'simple_html_dom.php';

$url = "https://www.imdb.com/title/tt7286456";

$html = file_get_html($url);

$title = $html->find('title', 0)->plaintext;
$description = $html->find("meta[name=description]", 0)->content;
$keywords = $html->find('meta[name=keywords]', 0)->content;

$links = [];

foreach ($html->find('a') as $link) {
    $links[] = $link->href;
}

$images = [];

foreach ($html->find("img") as $image) {
    $images[] = $image->src;
}


$moreLikeThisCardTitle = [];
$shovelerDivs = $html->find('div[data-testid=shoveler-items-container]');

foreach ($shovelerDivs as $div) {
    foreach ($div->find('div.ipc-poster-card') as $posterCardDiv) {
        $aTag = $posterCardDiv->find('a', 0);
        if ($aTag) {
            $moreLikeThisCardTitle[] =  $aTag->{'aria-label'};
        }
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>Title: $title</h1>";
    echo "<p>Description: $description</p>";
    echo "<p>Keywords: $keywords</p>";

    echo "<h2>Links:</h2><ul>";
    foreach ($links as $link) {
        echo "<li>$link</li>";
    }
    echo "</ul>";

    echo "<h2>Images:</h2>";
    foreach ($images as $img) {
        echo "<img src='$img' />";
    }

    echo "<h2>More Like This </h2><ul>";
    foreach ($moreLikeThisCardTitle as $title) {
        echo "<li>" . $title . "</li>";
    }
    echo "</ul>"
    ?>

</body>

</html>