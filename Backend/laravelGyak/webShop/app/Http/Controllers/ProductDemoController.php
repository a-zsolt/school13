<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDemoController extends Controller
{
    public function index(){

        $fakeProoducts = [
            ['name' =>'USB-C kábel', 'price' => 5990, 'description' => 'RGB + fps', 'category' => 'periferia'],
            ['name' =>'Wireless egér', 'price' => 16990, 'description' => 'Néha azért be kell dugni', 'category' => 'periferia'],
            ['name' =>'Cisco Router', 'price' => 325050, 'description' => 'KKV forgalom irányitás', 'category' => 'networking'],
        ];

        return view('products.index', [
            'products' => $fakeProoducts,
        ]);
    }
    public function create(){
        $categories = ['periferia', 'networking', 'computer'];

        return view('products.create', [
            'categories' => $categories,
        ]);
    }
    public function store(Request $request){
        $mode = $request->query('mode', 'ok');

        switch ($mode) {
            case 'validation':
                $errors = [
                    'name' => 'A termék megadása kötelező!',
                    'price' => 'A termék ára nem lehet negatív!',
                ];
                break;
            case 'ok':
            default:
                break;
        }
    }
}
