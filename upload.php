<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $target = '/tmp/' . time() . '_' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $target);
        echo "✅ File received.";
        exit;
    }

    if (!empty($_POST['data'])) {
        $filename = '/tmp/recon_' . time() . '.txt';
        file_put_contents($filename, $_POST['data']);
        echo "✅ Text data received.";
        exit;
    }

    echo "⚠️ No data found.";
} else {
    echo "POST data to this endpoint.";
}
?>
