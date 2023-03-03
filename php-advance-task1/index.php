<?php

// api.php has a class to call any api and get results
require_once("./api.php");
require_once("./service.php");
$call_api = new API();

// url of the api
$url = "https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services";

//results of the api as a php object
$result = $call_api->getData($url);


$objs;
$nums = 0;

$size = sizeof($result->data);
for ($i = 0; $i < $size; $i++) {
    if ($result->data["$i"]->attributes->field_secondary_title) {
        # code...
        $objs[$nums] = new Service($result->data[$i]);
        $nums += 1;
    }

}

// print_r($result->data["12"]->attributes->field_secondary_title->processed);
// print_r($result->data["12"]->attributes->field_services->processed);
// print_r($result->data["13"]->attributes->field_secondary_title->processed);
// print_r($result->data["13"]->attributes->field_services->processed);
// print_r($result->data["14"]->attributes->field_secondary_title->processed);
// print_r($result->data["14"]->attributes->field_services->processed);
// print_r($result->data["15"]->attributes->field_secondary_title->processed);
// print_r($result->data["15"]->attributes->field_services->processed);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    for ($i = 0; $i < sizeof($objs); $i++) {
        if ($i % 2 == 0) {
            echo "<div class = 'abc'>";
            echo "<div class ='left-part'>";
            print_r($objs[$i]->get_title());
            print_r($objs[$i]->get_list());
            echo "</div><div class = 'right-part'>";
            $src = $objs[$i]->image->path;
            $title = $objs[$i]->image->title;
            $alt = $objs[$i]->image->alt;
            $width = $objs[$i]->image->width;
            $height = $objs[$i]->image->height;
            echo "<img src = '$src' alt = '$alt' title ='$title' max-height='$height' max-width='$width' />";
            echo "</div></div>";
        } else {
            echo "<div class = 'abc'>";
            echo "<div class ='left-part'>";
            $src = $objs[$i]->image->path;
            $title = $objs[$i]->image->title;
            $alt = $objs[$i]->image->alt;
            $width = $objs[$i]->image->width;
            $height = $objs[$i]->image->height;
            echo "<img src = '$src' alt = '$alt' title ='$title' max-height='$height' max-width='$width' />";

            echo "</div><div class = 'right-part'>";
            print_r($objs[$i]->get_title());
            print_r($objs[$i]->get_list());
            echo "</div></div>";
        }
    }
    ?>
</body>

</html>