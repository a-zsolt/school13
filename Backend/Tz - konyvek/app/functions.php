<?php
declare(strict_types = 1);

function get_all_books(string $file):array {
    // $books = [
    //     ['id' => 1, 'cím' => '1984', 'szerző' => 'George Orwell', 'év' => 1949],
    //     ['id' => 2, 'cím' => 'A szolgálólány meséje', 'szerző' => 'Margaret Atwood', 'év' => 1985],
    // ];

    $file = file_get_contents($file);

    $books = json_decode($file, true);

    return $books;
}

function add_to_books(array $book, string $file) {
    
    array_unshift($book, );
    
    //$book = ["id" => get_all_books(__DIR__.'/data/books.json')[count($books) - 1]["id"] + 1] + $book;
    
    var_dump($book);
    $book = json_encode($book);
    $booksbefore = json_encode($books, JSON_UNESCAPED_UNICODE);
    $newBooks = $booksbefore + $book;

    $fp = fopen($file, 'w');
    fwrite($fp, $newBooks);
    fclose($fp);
}

function filter_books_by_author(array $data, string $author) {
    $filtered = [];

    foreach ($data as $key => $item) {
        if (str_contains($item["szerző"], $author)) $filtered[] = $item;
    }

    return $filtered;
}