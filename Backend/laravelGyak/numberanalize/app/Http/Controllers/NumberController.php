<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function show(Request $request, $num) {
        if (!is_numeric($num)) {
            return "Csak számot lehet az urlbe irni!";
        }

        $isEven = $num % 2 === 0;

        $factors = [];
        $n = $num;
        $d = 2;
        while ($n > 1) {
            while ($n % $d === 0) {
                $factors[] = $d;
                $n = $n / $d;
            }
            $d++;
        }


        return view('pages.number', [
            'num' => $num,
            'isEven' => $isEven,
            'factors' => $factors]
        );
    }
}
