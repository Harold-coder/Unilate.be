<?php


session_start();
session_unset();
session_destroy();

header("location: Accueilv0.8.php");
exit();