<?php
session_start();
session_unset();
session_destroy();
header("Location: ../src/Pages/login.php");
exit();
