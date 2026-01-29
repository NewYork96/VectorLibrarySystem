<?php

$envPath = dirname(__DIR__) . '/../.env';

if (!is_readable($envPath)) {
    http_response_code(500);
    die('.env file not found or not readable');
}

$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '' || str_starts_with($line, '#')) {
        continue;
    }

    if (!str_contains($line, '=')) {
        continue;
    }

    [$key, $value] = explode('=', $line, 2);

    $key = trim($key);
    $value = trim($value);

    $_ENV[$key] = $value;
    putenv("$key=$value");
}