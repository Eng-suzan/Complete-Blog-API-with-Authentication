<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = [
            ['title' => 'product 1', 'old_price' => 1200.00, 'new_price' => 9991.11],
            ['title' => 'product 2', 'old_price' => 1200.00, 'new_price' => 9992.22],
            ['title' => 'product 3', 'old_price' => 1200.00, 'new_price' => 9993.33],
            ['title' => 'product 4', 'old_price' => 1200.00, 'new_price' => 9994.44],
            ['title' => 'product 5', 'old_price' => 1200.00, 'new_price' => 9995.55],
            ['title' => 'product 6', 'old_price' => 1200.00, 'new_price' => 9996.66],
        ];
        return view('home', ['products' => $products]);
    }
    public function login()
    {
        return view('login');
    }
}