<?php
require_once 'controllers/AbsensiController.php';

$controller = new AbsensiController();

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $controller->create();
    } elseif (isset($_POST['update'])) {
        $controller->update();
    }
} elseif (isset($_GET['delete'])) {
    $controller->delete();
}

// Show main view
$controller->index();
