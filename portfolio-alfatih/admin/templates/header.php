<?php
// Prevent direct access
if (!defined('BASE_URL')) {
    require_once '../../config/constants.php';
}

// Check if session is started
require_once __DIR__ . '/../../includes/helpers.php';
startSession();

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    setAlert('error', 'Please login to access the admin panel');
    header('Location: ' . BASE_URL . '/admin/login.php');
    exit;
}

// Function to check current admin page
function isCurrentAdminPage($page) {
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    return ($currentPage == $page) ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' - Admin Panel' : 'Admin Panel' ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/admin.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="admin-content">
            <!-- Topbar -->
            <div class="admin-topbar">
                <div class="topbar-left">
                    <button id="sidebar-toggle" class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="topbar-right">
                    <div class="admin-user">
                        <span><?= $_SESSION['admin_username'] ?></span>
                        <img src="<?= BASE_URL ?>/assets/img/admin-avatar.png" alt="Admin" class="admin-avatar">
                    </div>
                </div>
            </div>
            
            <!-- Alert messages -->
            <?php displayAlert(); ?>