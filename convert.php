<?php

$migrationsDir = __DIR__ . '/database/migrations';
$modelsDir = __DIR__ . '/app/Models';
$output = [];

// 1. Process Migrations
$migrationFiles = glob($migrationsDir . '/*.php');
foreach ($migrationFiles as $file) {
    $content = file_get_contents($file);
    $original = $content;

    // Replace $table->id(); with $table->uuid('id')->primary();
    $content = preg_replace('/\$table->id\(\);/', "\$table->uuid('id')->primary();", $content);
    
    // Replace $table->foreignId('...') with $table->foreignUuid('...')
    $content = preg_replace('/\$table->foreignId\(/', "\$table->foreignUuid(", $content);
    
    // Replace $table->unsignedBigInteger('contratlocation_id');
    $content = preg_replace('/\$table->unsignedBigInteger\(\'contratlocation_id\'\);/', "\$table->uuid('contratlocation_id');", $content);
    
    // For Spatie permissions migration
    if (basename($file) === '2025_07_07_100714_create_permission_tables.php') {
        $content = preg_replace(
            '/\$table->unsignedBigInteger\(\$columnNames\[\'model_morph_key\'\]\);/',
            "\$table->uuid(\$columnNames['model_morph_key']);",
            $content
        );
    }

    if ($content !== $original) {
        file_put_contents($file, $content);
        $output[] = "Updated migration: " . basename($file);
    }
}

// 2. Process Models
$modelFiles = glob($modelsDir . '/*.php');
foreach ($modelFiles as $file) {
    $content = file_get_contents($file);
    $original = $content;

    // Skip non-class files or files that already use HasUuids
    if (strpos($content, 'class ') === false) {
        continue;
    }

    if (strpos($content, 'HasUuids') === false) {
        // Add import after namespace App\Models;
        $namespacePattern = '/namespace App\\\\Models;/';
        $content = preg_replace($namespacePattern, "namespace App\Models;\n\nuse Illuminate\Database\Eloquent\Concerns\HasUuids;", $content);

        // Add use HasUuids; inside class definition
        // Locate the first { after class definition
        $classPattern = '/(class\s+\w+.*?{)/s';
        $content = preg_replace($classPattern, "$1\n    use HasUuids;", $content);
    }

    if ($content !== $original) {
        file_put_contents($file, $content);
        $output[] = "Updated model: " . basename($file);
    }
}

echo "CONVERSION COMPLETE\n";
echo implode("\n", $output) . "\n";
