<?php
declare(strict_types=1);

require __DIR__ . '/app/data.php';
require __DIR__ . '/app/functions.php';
require __DIR__ . '/app/view_functions.php';



if (isset($_GET["query"])) {
    $filtered_sightings = filterByName($sightings, $_GET["query"]);
} else {
    $filtered_sightings = $sightings;
}

//var_dump($_GET);
$page = $_GET["page"] ?? "home" ;

$page_map = [
    "home" =>  [
        "title" => "Főoldal",
        "view" => "pages/home.v.php"
    ],
    "list" => [
        "title" => "Észlelések",
        "view" => "pages/list.v.php"
    ],
    "report" => [
        "title" => "Bejelentés",
        "view" => "pages/report.v.php"  
    ] ,
];

//echo $page;
//header - html eleje, fejléc
require __DIR__."/view/partials/header.v.php";

//require __DIR__ . '/view/partials/menu.v.php';

if(isset($page_map[$page])){
    require __DIR__."/view/".$page_map[$page]["view"];
} else{
    echo "404 - Page not found";
}
//footer - html vége
require __DIR__."/view/partials/footer.v.php";
