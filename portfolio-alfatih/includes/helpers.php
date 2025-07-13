<?php
// Session functions
function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Alert message functions
function setAlert($type, $message) {
    startSession();
    $_SESSION['alert'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getAlert() {
    startSession();
    if (isset($_SESSION['alert'])) {
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
        return $alert;
    }
    return null;
}

function displayAlert() {
    $alert = getAlert();
    if ($alert) {
        $type = $alert['type'];
        $message = $alert['message'];
        echo "<div class='alert alert-{$type}'>{$message}</div>";
    }
}

// Text helper functions
function truncateText($text, $length = 150) {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, ' '));
    return $text . '...';
}

// URL and navigation helpers
function isCurrentPage($pageName) {
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    return ($currentPage == $pageName) ? 'active' : '';
}

// Slug generator
function generateSlug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    $text = preg_replace('/\s+/', '-', $text);
    return trim($text, '-');
}

// File upload helper
function uploadFile($file, $targetDir, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']) {
    $fileName = basename($file['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    // Validate file type
    if (!in_array(strtolower($fileType), $allowedTypes)) {
        return [
            'success' => false,
            'message' => 'Hanya file ' . implode(', ', $allowedTypes) . ' yang diperbolehkan.'
        ];
    }
    
    // Generate unique filename to prevent overwriting
    $newFileName = uniqid() . '.' . $fileType;
    $targetFilePath = $targetDir . $newFileName;
    
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return [
            'success' => true,
            'filename' => $newFileName
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Gagal mengupload file.'
        ];
    }
}
?>