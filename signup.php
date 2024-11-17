<?php
require_once "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract(array_map('trim', $_POST));
    if (empty($nom) || empty($prenom) || empty($user) || empty($password)) {
        echo 1;
    }
    else{
    $query = "SELECT * FROM users WHERE login='$user' AND password=md5('$password')";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        echo -1;
    }
    else {
        $query = "INSERT INTO users VALUES (null,'$nom','$prenom','$user',md5('$password'));";
        $result = mysqli_query($con, $query);
        echo 0;
    }
}
}
?>