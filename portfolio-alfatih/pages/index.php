<?php
$pageTitle = "Home";
require_once '../config/koneksi.php';
require_once '../templates/header.php';

// Get 3 latest projects
$stmt = $pdo->query("SELECT * FROM proyek ORDER BY tanggal_dibuat DESC LIMIT 3");
$projects = $stmt->fetchAll();

// Get 3 latest articles
$stmt = $pdo->query("SELECT a.*, k.nama_kategori 
                    FROM artikel a 
                    JOIN kategori k ON a.id_kategori = k.id 
                    ORDER BY a.tanggal_dibuat DESC LIMIT 3");
$articles = $stmt->fetchAll();

// Get profile data
$stmt = $pdo->query("SELECT * FROM profil WHERE id = 1");
$profile = $stmt->fetch();

// Get job titles for typing effect
$stmt = $pdo->query("SELECT * FROM job_titles ORDER BY id ASC");
$jobTitles = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);
$jobTitlesJSON = json_encode($jobTitles);
?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text" data-aos="fade-right">
                <h1>Hi, I'm <?= OWNER_NAME ?></h1>
                <div class="hero-subtitle">
                    <span id="typed-text"></span>
                </div>
                <p><?= $profile['summary'] ?? __('hero_subtitle') ?></p>
                <div class="hero-buttons">
                    <a href="<?= BASE_URL ?>/pages/projects.php" class="btn btn-primary"><?= __('view_projects') ?></a>
                    <a href="<?= BASE_URL ?>/pages/contact.php" class="btn btn-outline"><?= __('contact_me') ?></a>
                </div>
            </div>
            <div class="hero-image" data-aos="fade-left">
                <img src="<?= BASE_URL ?>/uploads/profile/<?= $profile['profile_image'] ?? 'default-profile.jpg' ?>" alt="<?= OWNER_NAME ?>">
            </div>
        </div>
    </div>
</section>

<!-- Latest Projects Section -->
<section class="latest-projects section-padding" id="latest-projects">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2><?= __('latest_projects') ?></h2>
            <p><?= __('latest_projects_subtitle') ?></p>
        </div>
        
        <div class="projects-grid">
            <?php if (count($projects) > 0): ?>
                <?php foreach ($projects as $index => $project): ?>
                    <div class="project-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="project-img">
                            <img src="<?= BASE_URL ?>/uploads/projects/<?= $project['gambar_proyek'] ?>" alt="<?= $project['judul'] ?>">
                        </div>
                        <div class="project-info">
                            <span class="project-category"><?= $project['kategori'] ?></span>
                            <h3><?= $project['judul'] ?></h3>
                            <p><?= truncateText($project['deskripsi'], 100) ?></p>
                            <a href="<?= $project['link_proyek'] ?>" class="btn-link" target="_blank"><?= __('view_project') ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-data"><?= __('no_projects') ?></p>
            <?php endif; ?>
        </div>
        
        <div class="section-footer" data-aos="fade-up">
            <a href="<?= BASE_URL ?>/pages/projects.php" class="btn btn-secondary"><?= __('view_all_projects') ?></a>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<section class="latest-articles section-padding" id="latest-articles">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2><?= __('latest_articles') ?></h2>
            <p><?= __('latest_articles_subtitle') ?></p>
        </div>
        
        <div class="articles-grid">
            <?php if (count($articles) > 0): ?>
                <?php foreach ($articles as $index => $article): ?>
                    <div class="article-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="article-img">
                            <img src="<?= BASE_URL ?>/uploads/articles/<?= $article['gambar_unggulan'] ?>" alt="<?= $article['judul'] ?>">
                            <span class="article-category"><?= $article['nama_kategori'] ?></span>
                        </div>
                        <div class="article-info">
                            <h3><?= $article['judul'] ?></h3>
                            <p><?= truncateText($article['konten'], 120) ?></p>
                            <div class="article-meta">
                                <span><i class="far fa-calendar"></i> <?= date('d M Y', strtotime($article['tanggal_dibuat'])) ?></span>
                                <a href="<?= BASE_URL ?>/pages/blog-single.php?slug=<?= $article['slug'] ?>" class="read-more"><?= __('read_more') ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-data"><?= __('no_articles') ?></p>
            <?php endif; ?>
        </div>
        
        <div class="section-footer" data-aos="fade-up">
            <a href="<?= BASE_URL ?>/pages/blog.php" class="btn btn-secondary"><?= __('view_all_articles') ?></a>
        </div>
    </div>
</section>

<script>
    // Store job titles for typed.js
    var jobTitles = <?= $jobTitlesJSON ?>;
</script>

<?php require_once '../templates/footer.php'; ?>