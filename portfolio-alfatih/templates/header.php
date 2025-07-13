<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../includes/helpers.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' . OWNER_NAME : OWNER_NAME . ' - Portfolio' ?></title>
    <meta name="description" content="Portfolio professional <?= OWNER_NAME ?>, seorang Web Developer dan UI/UX Designer.">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/img/favicon.ico" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
    <!-- Cursor Effect -->
    <div class="cursor-dot-outline"></div>
    <div class="cursor-dot"></div>
    
    <!-- Particles Background -->
    <div id="particles-js"></div>
    
<!-- Back to top button -->
<button id="backToTop" title="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Header -->
    <header class="glassmorphism">
        <nav class="navbar">
            <div class="container">
                <a href="<?= BASE_URL ?>" class="logo"><?= OWNER_NAME ?></a>
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="nav-menu">
                    <li><a href="<?= BASE_URL ?>/pages/index.php" class="<?= isCurrentPage('index.php') ?>"><?= __('home') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/about.php" class="<?= isCurrentPage('about.php') ?>"><?= __('about') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/projects.php" class="<?= isCurrentPage('projects.php') ?>"><?= __('projects') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/cv.php" class="<?= isCurrentPage('cv.php') ?>"><?= __('cv') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/semester.php" class="<?= isCurrentPage('semester.php') ?>"><?= __('semester') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/blog.php" class="<?= isCurrentPage('blog.php') ?>"><?= __('blog') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/contact.php" class="<?= isCurrentPage('contact.php') ?>"><?= __('contact') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/pages/testimonials.php" class="<?= isCurrentPage('testimonials.php') ?>"><?= __('testimonials') ?></a></li>
                    <li><a href="<?= BASE_URL ?>/admin/login.php" class="login-btn"><i class="fas fa-user"></i> <?= __('login') ?></a></li>
                    <li class="language-switcher">
                        <div class="language-dropdown">
                            <button class="language-btn">
                                <?php if ($lang === 'id'): ?>
                                    <img src="<?= BASE_URL ?>/assets/img/id-flag.png" alt="Indonesia"> ID
                                <?php else: ?>
                                    <img src="<?= BASE_URL ?>/assets/img/en-flag.png" alt="English"> EN
                                <?php endif; ?>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="language-dropdown-content">
                                <a href="?lang=id" <?= $lang === 'id' ? 'class="active"' : '' ?>>
                                    <img src="<?= BASE_URL ?>/assets/img/id-flag.png" alt="Indonesia"> Indonesia
                                </a>
                                <a href="?lang=en" <?= $lang === 'en' ? 'class="active"' : '' ?>>
                                    <img src="<?= BASE_URL ?>/assets/img/en-flag.png" alt="English"> English
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <!-- Alert messages -->
    <?php displayAlert(); ?>
    
    <!-- Main Content -->
    <main>