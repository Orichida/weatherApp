<?php
require_once '../security.php';
require_once '../connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = $_SESSION['user']['id'];
    $query = "DELETE from history WHERE idUser = '$idUser'";
    $result = mysqli_query($con, $query);
    echo "All history has been reset";
}