<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "deneme";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}

$conn->set_charset("utf8");
?>
