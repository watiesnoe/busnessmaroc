<?php
header('Content-Type: text/plain');

function find_writable_dirs($dir) {
    if (!is_dir($dir)) return;
    
    $it = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($it, RecursiveIteratorIterator::SELF_FIRST) as $file) {
        if ($file->isDir() && is_writable($file->getPathname())) {
            echo "Writable: " . $file->getPathname() . "\n";
        }
    }
}

echo "Finding writable directories inside busnessmaroc...\n";
find_writable_dirs(realpath(__DIR__ . '/../'));
echo "DONE\n";
