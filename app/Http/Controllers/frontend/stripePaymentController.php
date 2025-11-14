<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Product;
use App\Models\Order;

class StripePaymentController extends Controller
{
    public function stripePaymentProcess()
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        $product = Product::all();

        $lineItems = [];

        foreach ($product as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product_title,
                    ],
                    'unit_amount' => $item->product_price * 100, // in cents
                ],
                'quantity' => 1,
            ];
        }

        $session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',

            'success_url' => route('payment.success'),
            'cancel_url' => route('pyment.error'),
        ]);

        // Save order BEFORE redirect
        $order = new Order();
        $order->order_id = $session->id; // Stripe session ID
        $order->products = $session->product_id; // Save product IDs as JSON
        $order->product_qty = $session->product_qty; // Optional if tracking quantity
        $order->product_user = auth()->id();
        $order->total_amount = $session->total_amount;
        $order->confirm = 0;
        $order->delivery = 0;
        $order->confirm = 0;
        $order->save();

        return redirect($session->url);
    }

    public function success()
    {
        return view('success');
    }

    public function error()
    {
        return view('error');
    }
}
