<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Checkout extends Controller
{
    public function index()
    {

        return view('checkout', [
            'checkout' => $checkout,
        ]);
    }
}
