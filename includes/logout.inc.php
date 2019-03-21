<?php
require_once 'dbh.inc.php';
session_start();

echo "<script>confirm('Hendak log keluar?');</script>";

if ($_POST['confirm'] !== 1) {
    echo "<script>window.location.href = '../index.php';</script>";
    session_destroy();
    session_unset();
    exit();
} else {
    echo "<script>window.location.href = '../menu.php';</script>";
    exit();
}