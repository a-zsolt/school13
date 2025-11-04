<?php

require_once 'book.php';
require_once 'member.php';

$books = array();

$books[] = new Book("Harry Potter és a bölcsek köve", "J.K. Rowling", "978-963-689-380-4");
$books[] = new Book("A Gyűrűk Ura: A Gyűrű Szövetsége", "J.R.R. Tolkien", "978-963-689-123-0");
$books[] = new Book("1984", "George Orwell", "978-963-689-456-2");
$books[] = new Book("A kis herceg", "Antoine de Saint-Exupéry", "978-963-689-789-3");
$books[] = new Book("A Hobbit", "J.R.R. Tolkien", "978-963-689-321-1");
$books[] = new Book("Száz év magány", "Gabriel García Márquez", "978-963-689-654-0");

$members = array();

$members[] = new Memeber("Kovács Péter", "T001");
$members[] = new Memeber("Nagy Anna", "T002");
$members[] = new Memeber("Kanye West", "T003");



function showState($books, $members)
{
    echo "\nKönyvek:";
    foreach ($books as $book) 
    {
        echo "  " . $book->getData() . "";
    }

    echo "\nTagok:";
    foreach ($members as $member) 
    {
        echo "  " . $member->getData() . "";
    }
}

echo "=== Kezdő Állapot ===";
showState($books, $members);

if ($members[0]->canRent() && $books[0]->rent($members[0])) {
    $members[0]->rentBook();
}

if ($members[0]->canRent() && $books[1]->rent($members[0])) {
    $members[0]->rentBook();
}

if ($members[1]->canRent() && $books[2]->rent($members[1])) {
    $members[1]->rentBook();
}

if ($members[2]->canRent() && $books[3]->rent($members[2])) {
    $members[2]->rentBook();
}

echo "\n=== SIKERTELEN KÖLCSÖNZÉSI KISÉRLET ===";

$books[0]->rent($members[2]);

echo "\n=== VISSZAVONÁSOK ===";

if ($books[0]->back()) {
    $members[0]->returnBook();
}

if ($books[4]->back()) {
    $members[1]->returnBook();
}

echo "\n=== ELÉRHETŐ KÖNYVEK ===";

foreach ($books as $book) {
    if ($book->isAvailable()) {
        echo "  " . $book->getData() . "";
    }
}

echo "\n=== VÉGSŐ ÁLLAPOT ===";

showState($books, $members);
