<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: login_halaman.php');
    exit;
}

include('./navbar.php');
