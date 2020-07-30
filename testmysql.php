<?php
$mysqli = new mysqli('66.147.242.186', 'urcscon3_dc', 'Project4_dc!', 'urcscon3_dc');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo '<div>Connection OK '. $mysqli->host_info.'</div>';
echo '<div>Server '.$mysqli->server_info.'</div>';
$mysqli->close();
?>