<?php
    declare(strict_types = 1);

    function generateMenu($pages, $active_page){
        $nav = '
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <span class="material-symbols-rounded">book_2</span>
                        <a class="navbar-brand" href="#">Könyvklub nyilvántartó rendszer</a>
                    </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
        ';

        $nav .= '<ul class="navbar-nav">';
        foreach ($pages as $page_key => $page) {
            if ($active_page === $page_key) {
                $nav .= '<li class="nav-item"><a class="nav-link active" href="?page='. $page_key .'">'. $page["title"] .'</a></li>';
            } else {
                $nav .= '<li class="nav-item"><a class="nav-link" href="?page='. $page_key .'">'. $page["title"] .'</a></li>';
            }
        }
        $nav .= '
                    </ul>
                </div>
            </div>
        </nav>';

        echo $nav;
    }

    function render_book_row(array $book):string {
        $row = '<tr>';

        foreach ($book as $key => $value) {
            if ($key === "id") {
                $row = $row . '<th scope="row">'. $value .'</th>';
            } else {
                $row = $row . '<td>'. $value .'</td>';
            }
        }
        $row = $row . '</tr>';

        return $row;
    }
?>