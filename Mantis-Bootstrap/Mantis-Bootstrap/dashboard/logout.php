<?php
session_start();
session_unset();
session_unset();
header("Location: login.php");
exit;
?>
