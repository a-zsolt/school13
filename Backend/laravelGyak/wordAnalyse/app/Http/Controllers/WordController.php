<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    public function show($text) {
        $length = mb_strlen($text, 'UTF-8');
        $upper = mb_strtoupper($text, 'UTF-8');
        $lower = mb_strtolower($text, 'UTF-8');
        $freakuency = [];
        $isPal = false;
        $syllables = 0;

        $chars = mb_str_split($lower);
        foreach ($chars as $char) {
            if (!array_key_exists($char, $freakuency)) {
                $freakuency[$char] = 1;
            } else {
                $freakuency[$char]++;
            }
        }

        $reverse = "";
        for ($i = $length - 1; $i >= 0; $i--) {
            $reverse .= mb_substr($lower, $i, 1, 'UTF-8');
        }

        if ($reverse == $lower) $isPal = true;

        $maganhangzok = 'aáeéiíoóöőuúüű';

        foreach ($chars as $char) {
            if (mb_strpos($maganhangzok, $char) !== false) {
                $syllables++;
            }
        }

        return view('pages.word', [
            'originalText' => $text,
            'upperText' => $upper,
            'lowerText' => $lower,
            'textLenght' => $length,
            'letterFrequency' => $freakuency,
            'textSyllables' => $syllables,
            'isPal' => $isPal
        ]);

    }

}
