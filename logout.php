<?php
session_start();
unset($_SESSION['loginusername']);
session_destroy();
header("location:index.php");


?>