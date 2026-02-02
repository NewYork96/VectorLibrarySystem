<?php
//Az .env file helye.
$envPath = dirname(__DIR__) . '/../.env';

// .env fájl sorainak beolvasása tömbbe
// Üres sorok kihagyása, sortörések eltávolítása
$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    // Sor elejéről és végéről az üres karakterek eltávolítása
    $line = trim($line);

    // Üres sorok és kommentek (#-tel kezdődő sorok) kihagyása
    if ($line === '' || str_starts_with($line, '#')) {
        continue;
    }

    // Ha a sor nem tartalmaz kulcs=érték formátumot, kihagyjuk
    if (!str_contains($line, '=')) {
        continue;
    }

    // Kulcs és érték szétválasztása az első '=' mentén
    [$key, $value] = explode('=', $line, 2);

    // Kulcs és érték megtisztítása felesleges whitespace-től
    $key = trim($key);
    $value = trim($value);

    // Környezeti változó beállítása a futó PHP folyamat számára
    $_ENV[$key] = $value;

    // Környezeti változó beállítása a rendszer szintű környezetben
    putenv("$key=$value");
}