<?php

function generateMenu($pages, $active_page){
    echo '<ul class="nav nav-pills nav-justified">';
    foreach ($pages as $page_key => $page) {
        if ($active_page === $page_key) {
            echo '<li class="nav-item"><a class="nav-link active" href="?page='. $page_key .'">'. $page["title"] .'</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="?page='. $page_key .'">'. $page["title"] .'</a></li>';
        }
    }
    echo "</ul>";
}

