<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

header('Content-Type: application/json');

try {

    $pdo = getPDO();


    $stmt = $pdo->query('SELECT id, name, settings_json FROM presets ORDER BY name ASC');
    $presets = $stmt->fetchAll();

    foreach ($presets as &$preset) {
        $preset['settings'] = json_decode($preset['settings_json'], true, 512, JSON_THROW_ON_ERROR);
        unset($preset['settings_json']);
    }
    unset($preset);

    echo json_encode([
        'success' => true,
        'presets' => $presets
    ], JSON_THROW_ON_ERROR);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
