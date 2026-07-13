<?php

$modelsDir = __DIR__ . '/app/Models';
$files = glob($modelsDir . '/*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    $filename = basename($file);
    
    if (strpos($content, 'class ') === false) {
        continue;
    }
    
    // Check if it already uses the HasUuid trait
    if (strpos($content, 'HasUuid') !== false) {
        // If it's Immobilier.php, let's clean up the manual boot and routeKeyName we added
        if ($filename === 'Immobilier.php') {
            // Revert manual boot and routeKeyName and use the trait instead
            $content = preg_replace('/\/\*\* Route model binding via UUID \*\/.*?protected static function boot\(\).*?\{.*?\}\n+/s', '', $content);
            $content = preg_replace('/use HasFactory;/', "use HasFactory, \\App\\Traits\\HasUuid;", $content);
            file_put_contents($file, $content);
            echo "Cleaned up and added HasUuid to Immobilier.php\n";
        }
        continue;
    }
    
    // Inject the trait usage.
    // We search for class opening brace '{' and insert "    use \App\Traits\HasUuid;\n" after it.
    // But wait! If the model already uses HasFactory, e.g. "use HasFactory;", we can replace it with "use HasFactory, \App\Traits\HasUuid;"
    if (strpos($content, 'use HasFactory;') !== false) {
        $content = str_replace('use HasFactory;', 'use HasFactory, \\App\\Traits\\HasUuid;', $content);
    } else {
        // Find class { and insert
        $pattern = '/(class\s+\w+\s+(?:extends\s+\w+\s*)?\{)/';
        $content = preg_replace($pattern, "$1\n    use \\App\\Traits\\HasUuid;", $content);
    }
    
    file_put_contents($file, $content);
    echo "Added HasUuid to $filename\n";
}

echo "Done applying HasUuid trait to all models!\n";
