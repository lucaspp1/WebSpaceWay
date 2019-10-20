<?php
    session_start();
    $_SESSION["Login"] = "";
    unset( $_SESSION["Login"] );
    echo "<script> window.location = '/'; </script>";
?>