<?php

$logDir = __DIR__ . '/logs';

// Ensure logs folder exists
if (!file_exists($logDir)) {
    mkdir($logDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // === Handle FILE upload ===
    if (isset($_FILES['file'])) {
        $target = $logDir . '/' . time() . '_' . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            echo "✅ File received and stored at: logs/" . basename($target);
        } else {
            echo "❌ Upload failed.";
        }
        exit;
    }

    // === Handle TEXT/RECON data ===
    if (!empty($_POST['data'])) {
        $filename = $logDir . '/recon_' . time() . '.txt';
        file_put_contents($filename, $_POST['data']);
        echo "✅ Text data received and stored at: logs/" . basename($filename);
        exit;
    }

    echo "⚠️ POST received, but no data or file.";
} else {
    echo "POST data to this endpoint.";
}
?>
