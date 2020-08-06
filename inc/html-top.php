<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project 5 - DC</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto%20Sans%20JP">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pangolin">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php
    echo $customCSS;
    if ($useNav) {
        echo "<link rel='stylesheet' href='css/navigation.css'>";
    }?>
</head>
<body class="<?php echo $bodyCSS ?>">
<?php
if ($useNav) {
    include "inc/nav.php";
}?>