<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Auth; 

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
        \Stripe\Stripe::setApiKey('sk_test_51IO24XIadbaPhcttk6KVmDROPN8Qp1wa6U7SWUYqJATVNA75ZM7M5PIS0OT8ov2NxqyS3znrQLGOnRocGqMvkw6r009MwoaA6p');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
          ]);
          
          $checkout = $user->checkoutCharge(1200, 'T-Shirt', 5);

            return view('checkout', [
                'checkout' => $checkout,
            ]);
            */
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = 100*$request->input('price');
        $user = Auth::user();
        $request->user()->charge(
            $price, 'pm_card_us'
        );       
        $message = $request->input('price') . ' Amount Captured Successfully..';
        return redirect()->back()->with('message', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
