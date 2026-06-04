<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: register.php");
} else {
    header("Location: profile.php");
}
exit();