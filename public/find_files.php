<?php
header('Content-Type: text/plain');

function find_file($dir, $filename) {
    if (!is_dir($dir)) return;
    
    $it = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($it) as $file) {
        if (strpos($file->getFilename(), $filename) !== false) {
            echo "Found: " . $file->getPathname() . " (Size: " . $file->getSize() . " bytes)\n";
        }
    }
}

echo "Searching for bootstrap-icons font files ...\n";
find_file(realpath(__DIR__ . '/../../'), 'bootstrap-icons.wo');

echo "\nSearching for fontawesome font files ...\n";
find_file(realpath(__DIR__ . '/../../'), 'fa-solid-900');

echo "\nDONE\n";
