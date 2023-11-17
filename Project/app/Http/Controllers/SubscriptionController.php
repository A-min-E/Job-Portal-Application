<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\isEmployer;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    const WEEKLY_AMOUNT = 20;
    const MONTHLY_AMOUNT = 80;
    const YEARLY_AMOUNT = 200;
    const CURRENCY = "USD";

    public function __construct(){
        $this->middleware(['auth',isEmployer::class]);
    }
    public function subscribe(){
        return view('subscription.index');
    }

    public function initiatePayment(Request $request){
        $plans = [
                'weekly' => [
                    'name' => 'weekly',
                    'description' => 'weekly payment',
                    'amount' => self::WEEKLY_AMOUNT,
                    'currency' => self::CURRENCY,
                    'quantity' => 1
                ],
                'monthly' => [
                    'name' => 'monthly',
                    'description' => 'monthly payment',
                    'amount' => self::MONTALY_AMOUBT,
                    'currency' => self::CURRENCY,
                    'quantity' => 1,
                ],
                'yearly' => [
                    'name' => 'yearly',
                    'description' => 'yearly payment',
                    'amount' => self::YEARLY_AMOUBT,
                    'currency' => self::CURRENCY,
                    'quantity' => 1,
                ]
            ];
            //initiate payment
            Stripe::setApiKey(config('services.stripe.secret'));
            try{

            }catch(\Exception $e){

            }

    }

    public function paymentSuccess(Request $request){
        //update db
    }

    public function cancel(){
        //redirect
    }
}
