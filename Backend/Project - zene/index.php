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
$all_tracks = get_all_tracks(__DIR__ . '/app/data.json');
$tracks = get_all_tracks(__DIR__ . '/app/data.json');



switch ($page) {
    case 'playlist':
        $filter_genre = $_GET["genre"] ?? null;
        $filter_decade = $_GET["decade"] ?? null;
        $page_title = "Összes Zene";
        include 'view/partials/header.template.php';
        if (empty($filter_genre) || $filter_genre === 'null') {
            $filter_genre = null;
        }
        if (empty($filter_decade) || $filter_decade === 'null') {
            $filter_decade = null;
        }
        
        if ($filter_genre !== null && $filter_decade !== null) {
            $tracks = filter_tracks_by_genre($filter_genre, $tracks);
            $tracks = filter_tracks_by_decade($filter_decade, $tracks);
            $page_title = "Zenék - " . $filter_genre . " & " . $filter_decade;
        } elseif ($filter_genre !== null) {
            $tracks = filter_tracks_by_genre($filter_genre, $tracks);
            $page_title = "Zenék - " . $filter_genre;
        } elseif ($filter_decade !== null) {
            $tracks = filter_tracks_by_decade($filter_decade, $tracks);
            $page_title = "Zenék - " . $filter_decade;
        }

        include 'view/pages/playlist.template.php';
        break;
    case 'add':
        $page_title = "Zene hozzáadás";
        include 'view/partials/header.template.php';
        $submitted = false;
        $error = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page_title = "Zene hozzáadás - Beküldve";
            $submitted = check_inputs();
            
            if ($submitted) {
                save_new_track($all_tracks, $_POST);
            }
            var_dump($result);
        }
        include 'view/pages/add_track.template.php';
        break;
    case 'home':
    default:
        $page_title = "Főoldal";
        include 'view/partials/header.template.php';
        include 'view/pages/home.template.php';
        break;
}

include 'view/partials/footer.template.php';