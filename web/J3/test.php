<?php
$conn = mysqli_connect("multiinnovation_db_1", "root", "root", "rtarf");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM `j3_part` WHERE 1 ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($row);


mysqli_close($conn);
?>