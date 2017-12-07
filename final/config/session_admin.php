<?php

session_start();

// check permission
if (!isset($_SESSION['user']) || $_SESSION['user']['status'] == 0) {

    header("Location: ../index.php");

}