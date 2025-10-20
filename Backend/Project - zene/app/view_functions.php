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

function render_track_row(array $track): string {
    $row = '<tr>';

    foreach($track as $track_key => $track_value) {
        switch($track_key){
            case 'lenght':
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
    $mins = $seconds;

    return $mins;
}

function format_genre(string $genre): string{
    $formated = '<span class="badge text-bg-primary">'. $genre .'</span>';

    return $formated;
}