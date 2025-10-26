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

    foreach($tracks as $track) {
        if (str_contains($track["genre"], $genre)) {
            array_push($filtered, $track);
        }
    }

    return $filtered;
}

function filter_tracks_by_decade(string $decade, array $tracks): array {
    $filtered = [];

    foreach($tracks as $track) {
        $trackDecade = substr(strval($track["year"]), 0, -1) . 0;

        if ($trackDecade === $decade) {
            array_push($filtered, $track);
        }
    }

    return $filtered;
}

function check_inputs() {
    foreach ($_POST as $input){
        if (strlen($input) < 3) {
            return false;
        }
    }

    return true;
}

function save_new_track($all_tracks, $new_track){
    $id = ["id" => $all_tracks[count($all_tracks) - 1]["id"] + 1];
    $new_track = array_merge( $id, $new_track );

    array_push($all_tracks, $new_track);

    $jsonString = json_encode(["tracks" => $all_tracks], JSON_PRETTY_PRINT);

    $fp = fopen(__DIR__.'/data.json', 'w');
    fwrite($fp, $jsonString);
    fclose($fp);
}
