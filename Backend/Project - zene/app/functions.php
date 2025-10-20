<?php
declare(strict_types = 1);

function get_all_tracks(string $file): array {
    $tracks = [];

    $file = file_get_contents($file);

    $tracks = json_decode($file, true);

    return $tracks["tracks"];
}

function filter_tracks_by_genre(string $genre, array $tracks): array {
    $filtered = [];

    return $filtered;
}

function filter_tracks_by_decade(string $decade, array $tracks): array {
    $filtered = [];

    return $filtered;
}
