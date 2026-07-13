<?php
header('Content-Type: text/plain');

function list_dir($path) {
    if (!is_dir($path)) {
        echo "Not a dir: $path\n";
        return;
    }
    echo "Files in $path:\n";
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $full = $path . '/' . $file;
        echo "- $file (" . (is_dir($full) ? 'DIR' : filesize($full) . ' bytes') . ")\n";
    }
}

list_dir(realpath(__DIR__ . '/asset/css/vendors'));
list_dir(realpath(__DIR__ . '/asset/js/vendor'));
list_dir(realpath(__DIR__ . '/asset/webfonts'));
