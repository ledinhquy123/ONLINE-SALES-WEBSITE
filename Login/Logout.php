<?php
    session_start();
    unset($_SESSION["account"]);
    // session_unset();
    header("Location: Login.php");
?>