<?php
    session_start();
    if(isset($_SESSION['user']) == false) {
		$_SESSION['info'] = "Login/Sign-up required";
        header('location:/site/index.php');
        exit();
    }
?>