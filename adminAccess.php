<?php
require_once 'functions.php';
if ($_SESSION['role'] !== 1) {
    header('Location: /');
    exit;
}