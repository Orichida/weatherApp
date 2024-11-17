<?php
require_once "../connect.php";
require_once "../security.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract(array_map('trim', $_POST));
    $idUser = $_SESSION["user"]["id"];
    $checkQuery = "SELECT * FROM history WHERE idPlace='$idPlace' and idUser='$idUser'";
    $result = mysqli_query($con, $checkQuery);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $queryH = "INSERT INTO history VALUES ('$idPlace','$idUser','$flag','$place','$origin','$lat','$long');";
        $resultH = mysqli_query($con, $queryH);
    }
}
?>