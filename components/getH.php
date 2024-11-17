<?php
require_once '../security.php';
require_once '../connect.php';
$idUser = $_SESSION["user"]["id"];
$histQuery = "SELECT * from history WHERE idUser = '$idUser' ";
$result = mysqli_query($con, $histQuery);
$count = mysqli_num_rows($result);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>