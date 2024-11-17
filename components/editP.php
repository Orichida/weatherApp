<?php
require_once '../security.php';
require_once '../connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract(array_map('trim', $_POST));
    $idUser = $_SESSION['user']['id'];
    $checkQuery = "SELECT * from users WHERE id = '$idUser' and password = md5('$oldPass')";
    $result = mysqli_query($con, $checkQuery);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo -1;
    } else {
        $query = "UPDATE users SET password = md5('$newPass') WHERE id = '$idUser'";
        $updateResult = mysqli_query($con, $query);
        echo 0;
    }
    
}
?>