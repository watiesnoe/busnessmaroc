<?php
header('Content-Type: text/plain');

echo "Current user (whoami): " . exec('whoami') . "\n";
echo "Current user (posix): " . posix_getpwuid(posix_geteuid())['name'] . "\n";

$dir = realpath(__DIR__ . '/../storage/framework/views');
echo "Views dir: $dir\n";
echo "Is directory: " . (is_dir($dir) ? 'YES' : 'NO') . "\n";
echo "Is writable: " . (is_writable($dir) ? 'YES' : 'NO') . "\n";
echo "Permissions: " . substr(sprintf('%o', fileperms($dir)), -4) . "\n";
echo "Owner ID: " . fileowner($dir) . "\n";

$test = $dir . '/test_compile.txt';
$res = @file_put_contents($test, "test");
if ($res !== false) {
    echo "SUCCESS writing to views!\n";
    @unlink($test);
} else {
    echo "FAILED writing to views!\n";
    print_r(error_get_last());
}
