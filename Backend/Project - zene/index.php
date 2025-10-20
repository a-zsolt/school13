<?php

require_once 'app/functions.php';
require_once 'app/view_functions.php';

$page_map = [
    "home" =>  [
        "title" => "Főoldal",
        "view" => "home"
    ],
    "playlist" => [
        "title" => "Összes Zene",
        "view" => "playlist"
    ] ,
    "add" => [
        "title" => "Zene hozzáadás",
        "view" => "add"
    ],
];

//$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = $_GET['page'] ?? 'home';
$tracks = get_all_tracks(__DIR__ . '/app/data.json');


include 'view/partials/header.template.php';

switch ($page) {
    case 'playlist':
        $filter_genre = $_GET["genre"] ?? null;
        $filter_decade = $_GET["decade"] ?? null;
        $page_title = "Összes Zene";
        if ($filter_genre) {
            $tracks = filter_tracks_by_genre($filter_genre, $tracks);
            $page = "Zenék - " . $filter_genre;
        } else if ($filter_decade) {
            $tracks = filter_tracks_by_decade($filter_decade, $tracks);
            $page = "Zenék - " . $filter_decade;
        } else if ($filter_genre && $filter_decade){
            $tracks = filter_tracks_by_genre($filter_genre, $tracks);
            $tracks = filter_tracks_by_decade($filter_decade, $tracks);
            $page = "Zenék - " . $filter_genre . "&" . $filter_decade;
        };

        include 'view/pages/playlist.template.php';
        break;
    case 'add':
        $page_title = "Zene hozzáadás";
        $submitted = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page_title = "Zene hozzáadás - Beküldve";
            $submitted = true;
            $result = $_POST;
        }
        include 'view/pages/add_track.template.php';
        break;
    case 'home':
    default:
        $page_title = "Főoldal";
        include 'view/pages/home.template.php';
        break;
}

include 'view/partials/footer.template.php';