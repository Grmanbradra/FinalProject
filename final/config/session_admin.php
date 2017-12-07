<?php

session_start();

// check permission
if (!isset($_SESSION['user'])) {

    header("Location: login.php");

}