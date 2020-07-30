<?php
$mysqli = new mysqli('66.147.242.186', 'urcscon3_lab10', 'coffee1N/21!', 'urcscon3_lab10');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo '<div>Connection OK '. $mysqli->host_info.'</div>';
echo '<div>Server '.$mysqli->server_info.'</div>';
$mysqli->close();
?>