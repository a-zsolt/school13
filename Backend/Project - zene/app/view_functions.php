<?php

function generateNavBar($pages, $active_page): string {
    $nav = '
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-end" href="?page=' . $pages['home']['view'] .'">
                    <span class="material-symbols-rounded">music_cast</span>
                    Zenék
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                
    ';

    foreach ($pages as $page_key => $page_value){
        if ($page_key === $active_page && $page_key != 'home'){
            $nav .= '<a class="nav-link active" aria-current="page" href="?page='. $page_value['view'] .'">' . $page_value['title'] .'</a>';
        } elseif($page_key != 'home') {
            $nav .= '<a class="nav-link" aria-current="page" href="?page='. $page_value['view'] .'">' . $page_value['title'] .'</a>';
        }
    }

    $nav .= '
                    </div>
                </div>
            </div>
        </nav>
    ';

    return $nav;
}

function generateFilters($tracks, $filter_genre, $filter_decade): string {
    $form = '
        <form class="row" method="GET">
            <div class="col-5">
                <div class="input-group">
                    <label class="input-group-text" for="reporterName">Előadó:</label>
                    <input type="hidden" value="playlist" name="page" id="page">
                    <select class="form-select" id="genre" name="genre">
                        
                    
    ';

    if ($filter_genre === null) {
        $form .= '<option selected value="null">összes</option>';
    } else {
        $form .= '<option value="null">összes</option>';
    }
    
    $genres = [];
    foreach($tracks as $track) {
        if (!in_array($track['genre'], $genres)) {
            array_push($genres, $track['genre']);
            if ($track['genre'] === $filter_genre) {
                $form .= '<option selected>'. $track['genre'] .'</option>';
            } else {
                $form .= '<option>'. $track['genre'] .'</option>';
            }
        }
    }

    $form .= '
        </select>
        <label class="input-group-text" for="reporterName">Évtized:</label>
        <select class="form-select" id="decade" name="decade">

    ';

    if ($filter_decade === null) {
        $form .= '<option selected value="null">összes</option>';
    } else {
        $form .= '<option value="null">összes</option>';
    }
    
    $decades = [];
    foreach($tracks as $track) {
        $trackDecade = substr($track["year"], 0, -1) . 0;

        if (!in_array($trackDecade, $decades)) {
            array_push($decades, $trackDecade);
            if ($trackDecade === $filter_decade) {
                $form .= '<option selected>'. $trackDecade .'</option>';
            } else {
                $form .= '<option>'. $trackDecade .'</option>';
            }
        }
    }

    $form .= '
                    </select>
                    <input class="btn btn-primary" type="submit" value="Szűrés">
                </div>
            </div>
        </form>
    ';

    return $form;
}

function render_track_row(array $track): string {
    $row = '<tr>';

    foreach($track as $track_key => $track_value) {
        switch($track_key){
            case 'length':
                $row .= '<td>'. format_duration($track_value) .'</td>';
                break;
            case 'genre':
                $row .= '<td>'. format_genre($track_value) .'</td>';
                break;
            case 'id':
                $row .= '<th scope="row">'. $track_value .'</th>';
                break;
            default:
                $row .= '<td>'. $track_value .'</td>';
                break;
        }
    }

    return $row . '</tr>';
}

function format_duration(string $seconds): string{
    $minutes = floor($seconds / 60);
    $seconds = $seconds % 60;

    return sprintf('%d:%02d', $minutes, $seconds);;
}

function format_genre(string $genre): string{
    $formated = '<span class="badge text-bg-primary">'. $genre .'</span>';

    return $formated;
}

function get_total_playlist_duration($tracks): int{
    $totalDuartion = 0;
    
    foreach ($tracks as $track){
        $totalDuartion += $track["length"];
    }

    return $totalDuartion;
}