<?php
$files = scandir(__DIR__);
echo "<h2>📂 Logs in /logs/</h2><ul style='font-family: monospace'>";
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $size = filesize(__DIR__ . '/' . $file);
        echo "<li><a href=\"$file\">$file</a> (" . round($size / 1024, 1) . " KB)</li>";
    }
}
echo "</ul>";
?>
