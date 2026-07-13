<?php
header('Content-Type: text/plain');

$paths = [
    __DIR__ . '/../storage/framework/views',
    __DIR__ . '/../storage/framework/cache',
    __DIR__ . '/../storage/framework/sessions',
    __DIR__ . '/../storage/logs',
];

foreach ($paths as $path) {
    $real = realpath($path);
    if (!$real) {
        echo "Path does not exist: $path\n";
        continue;
    }
    $target = $real . '/test_write.txt';
    $res = @file_put_contents($target, "Test");
    if ($res !== false) {
        echo "SUCCESS writing to $path\n";
        @unlink($target);
    } else {
        echo "FAILED writing to $path\n";
    }
}
