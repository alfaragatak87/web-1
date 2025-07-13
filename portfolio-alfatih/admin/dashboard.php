<?php
require_once '../config/constants.php';
require_once '../includes/helpers.php';
require_once '../config/koneksi.php';

// Start session and check if logged in
startSession();

if (!isset($_SESSION['admin_id'])) {
    setAlert('error', 'Please login to access the admin panel');
    header('Location: ' . BASE_URL . '/admin/login.php');
    exit;
}

// Get statistics
$statsProyek = $pdo->query("SELECT COUNT(*) FROM proyek")->fetchColumn();
$statsArtikel = $pdo->query("SELECT COUNT(*) FROM artikel")->fetchColumn();
$statsDokumen = $pdo->query("SELECT COUNT(*) FROM dokumen")->fetchColumn();
$statsMessages = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
$statsTestimonials = $pdo->query("SELECT COUNT(*) FROM testimonials")->fetchColumn();

// Get latest messages
$stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5");
$latestMessages = $stmt->fetchAll();

// Page title
$pageTitle = "Dashboard";
include '../admin/templates/header.php';
?>


<div class="admin-content-container">
    <!-- Tambahkan di awal semua halaman admin (seperti kelola_proyek.php, kelola_artikel.php, dll) -->

<div class="admin-breadcrumb">
    <div class="breadcrumb-container">
        <a href="<?= BASE_URL ?>/admin/dashboard.php" class="breadcrumb-item"><i class="fas fa-home"></i> Dashboard</a>
        <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
        <span class="breadcrumb-item active"><?= $pageTitle ?></span>
    </div>
    <div class="breadcrumb-actions">
        <a href="<?= BASE_URL ?>/admin/dashboard.php" class="btn btn-outline btn-sm"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
        <a href="<?= BASE_URL ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-external-link-alt"></i> View Site</a>
    </div>
</div>

    <div class="admin-content-header">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
        <p>Welcome back, <?= $_SESSION['admin_username'] ?>!</p>
    </div>
    
    <!-- Statistics Cards -->
    <div class="stats-container">
        <div class="stats-card">
            <div class="stats-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stats-info">
                <h3>Projects</h3>
                <p><?= $statsProyek ?></p>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stats-info">
                <h3>Articles</h3>
                <p><?= $statsArtikel ?></p>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stats-info">
                <h3>Documents</h3>
                <p><?= $statsDokumen ?></p>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stats-info">
                <h3>Messages</h3>
                <p><?= $statsMessages ?></p>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-icon">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div class="stats-info">
                <h3>Testimonials</h3>
                <p><?= $statsTestimonials ?></p>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2>Quick Actions</h2>
        <div class="quick-actions-grid">
            <a href="<?= BASE_URL ?>/admin/kelola_proyek.php?action=add" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Add New Project</span>
            </a>
            <a href="<?= BASE_URL ?>/admin/kelola_artikel.php?action=add" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Add New Article</span>
            </a>
            <a href="<?= BASE_URL ?>/admin/kelola_dokumen.php?action=add" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Upload Document</span>
            </a>
            <a href="<?= BASE_URL ?>/admin/kelola_testimonial.php?action=add" class="quick-action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Add Testimonial</span>
            </a>
        </div>
    </div>
    
    <!-- Latest Messages -->
    <div class="latest-messages">
        <div class="section-header">
            <h2>Latest Messages</h2>
            <a href="<?= BASE_URL ?>/admin/kelola_pesan.php" class="view-all-btn">View All</a>
        </div>
        
        <?php if (count($latestMessages) > 0): ?>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($latestMessages as $message): ?>
                    <tr>
                        <td><?= htmlspecialchars($message['name']) ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['subject']) ?></td>
                        <td><?= date('d M Y H:i', strtotime($message['created_at'])) ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>/admin/kelola_pesan.php?action=view&id=<?= $message['id'] ?>" class="action-btn view-btn" title="View Message">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= BASE_URL ?>/admin/kelola_pesan.php?action=delete&id=<?= $message['id'] ?>" class="action-btn delete-btn" title="Delete Message" onclick="return confirm('Are you sure you want to delete this message?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <p class="no-data">No messages to display yet.</p>
        <?php endif; ?>
    </div>
</div>

<?php include '../admin/templates/footer.php'; ?>