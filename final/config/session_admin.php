<?php

session_start();

// check permission
if (!isset($_SESSION['user']) || $_SESSION['user']['permission'] == 0) {

    header("Location: ../login.php");

}