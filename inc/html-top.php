<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Project 4 - DC</title>
    <?php
    echo $customCSS;
    if ($useNav) {
        echo "<link rel=\"stylesheet\" href=\"css/navigation.css\">";
    }?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto%20Sans%20JP">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pangolin">
</head>
<body class="<?php echo $bodyCSS ?>">
<?php
if ($useNav) {
    include "inc/nav.php";
}?>