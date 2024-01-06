<?php
require('../admin/config.php');
session_start();

$_SESSION = array();

session_destroy();

header("location:log.html");
exit();
?>
