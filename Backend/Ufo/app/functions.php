<?php

// function stats_display($array):int{
//     $db = 0;
//     $avg_age = 0;
//     $same_day = [];
//     $same_day_numb = 0;
//     for($i = 0; $i < count($array); $i++){
//         $db++;
//     }
//     foreach ($array as $key) {
//         $avg_age += $key["reporter"]["age"];
//     }
//     foreach ($array as $key) {
//         $new_date = strtotime($key["datetime"]);
//         for ($j = 0; $j < count($array); $j++) {
//             if ($new_date === $same_day[$j]) {
//                 $same_day_numb++;
//             }
//             else {
//                 $same_day += $new_date;
//             }
//         }
//     }
//     return $db .  $avg_age;
// }

function filterByName($data, $filter_name) {
    $filtered = [];

    foreach ($data as $key => $item) {
        if (str_contains($item["reporter"]["name"], $filter_name)) $filtered[] = $item;
    }

    return $filtered;
}