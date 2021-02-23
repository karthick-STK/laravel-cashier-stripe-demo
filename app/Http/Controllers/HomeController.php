<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $user = Auth::user();
        $stripeCharge = $request->user()->charge(
            200, 'pm_card_us'
        );
        return $stripeCharge;
        return view('checkout', [
            'checkout' => $checkout,
        ]);
    }
}
