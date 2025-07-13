<?php
ob_start();
$pageTitle = "Pengaturan";
require_once '../config/koneksi.php';
require_once '../includes/helpers.php';
require_once 'templates/header.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Loop through all settings
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'setting_') === 0) {
                $settingKey = substr($key, 8); // Remove 'setting_' prefix
                
                // Update setting in database
                $stmt = $pdo->prepare("UPDATE pengaturan SET nilai = :nilai WHERE kunci = :kunci");
                $stmt->bindParam(':nilai', $value);
                $stmt->bindParam(':kunci', $settingKey);
                $stmt->execute();
            }
        }
        
        setAlert('success', 'Settings updated successfully');
        header('Location: ' . BASE_URL . '/admin/kelola_pengaturan.php');
        exit;
    } catch (PDOException $e) {
        setAlert('error', 'Error: ' . $e->getMessage());
    }
}

// Get all settings
$stmt = $pdo->query("SELECT * FROM pengaturan ORDER BY id");
$settings = $stmt->fetchAll();
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
        <h1><i class="fas fa-cog"></i> Settings</h1>
        <p>Configure your website settings</p>
    </div>
    
    <div class="admin-form-container">
        <form action="" method="POST">
            <div class="settings-grid">
                <?php foreach ($settings as $setting): ?>
                    <div class="form-group">
                        <label for="setting_<?= $setting['kunci'] ?>"><?= $setting['deskripsi'] ?></label>
                        <?php if ($setting['kunci'] === 'footer_text' || $setting['kunci'] === 'meta_description'): ?>
                            <textarea id="setting_<?= $setting['kunci'] ?>" name="setting_<?= $setting['kunci'] ?>" class="form-control" rows="3"><?= $setting['nilai'] ?></textarea>
                        <?php elseif ($setting['kunci'] === 'enable_particles'): ?>
                            <select id="setting_<?= $setting['kunci'] ?>" name="setting_<?= $setting['kunci'] ?>" class="form-control">
                                <option value="1" <?= $setting['nilai'] == '1' ? 'selected' : '' ?>>Enabled</option>
                                <option value="0" <?= $setting['nilai'] == '0' ? 'selected' : '' ?>>Disabled</option>
                            </select>
                        <?php elseif ($setting['kunci'] === 'theme_color'): ?>
                            <input type="color" id="setting_<?= $setting['kunci'] ?>" name="setting_<?= $setting['kunci'] ?>" class="form-control color-picker" value="<?= $setting['nilai'] ?>">
                        <?php else: ?>
                            <input type="text" id="setting_<?= $setting['kunci'] ?>" name="setting_<?= $setting['kunci'] ?>" class="form-control" value="<?= $setting['nilai'] ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Settings</button>
            </div>
        </form>
    </div>
</div>

<style>
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .color-picker {
        height: 40px;
        padding: 5px;
        width: 100px;
    }
</style>

<?php 
require_once 'templates/footer.php';
ob_end_flush();
?>