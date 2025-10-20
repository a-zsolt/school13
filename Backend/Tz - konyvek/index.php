<?php

declare(strict_types=1);

require __DIR__ . '/app/data.php';
require __DIR__ . '/app/functions.php';
require __DIR__ . '/app/view_functions.php';

$page = $_GET['page'] ?? "home";

$page_map = [
    "home" =>  [
        "title" => "Főoldal",
        "view" => "/home.view.php"
    ],
    "list" => [
        "title" => "Könyvek",
        "view" => "books.view.php"
    ],
    "report" => [
        "title" => "Könyv hozzáadása",
        "view" => "new.view.php"
    ] ,
];

$books = get_all_books(__DIR__.'/data/books.json');

if (isset($_GET["query"])) {
    $books = filter_books_by_author($books, $_GET["query"]);
}

var_dump($books);

if($_SERVER["REQUEST_METHOD"] === "POST") {
    add_to_books($_POST, __DIR__.'/data/books.json');
}

require __DIR__."/view/partials/header.view.php";

if(isset($page_map[$page])){
    require __DIR__."/view/pages/".$page_map[$page]["view"];
} else{
    echo "404 - Page not found";
}

require __DIR__."/view/partials/footer.view.php";

?>