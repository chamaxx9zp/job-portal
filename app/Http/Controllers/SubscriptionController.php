<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Middleware\isEmployer;
use Illuminate\Support\Facades\URL;
use App\Http\Middleware\donotAllowUserToMakePayment;

class SubscriptionController extends Controller
{   
    const WEEKLY_AMOUNT = 20;
    const MONTHLY_AMOUNT = 80;
    const YEARLY_AMOUNT = 200;
    const CURRENCY = 'LKR';

    public function __construct()
    {
        $this->middleware(['auth', isEmployer::class]);
        $this->middleware(['auth', donotAllowUserToMakePayment::class])->except('subscribe');

    }

    public function subscribe()
    {
        return view('subscription.index');
    }

    public function initiatePayment(Request $request)
    {
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment',
                'amount' => self::WEEKLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment',
                'amount' => self::MONTHLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment',
                'amount' => self::YEARLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
        ];

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $selectPlan = null;
            if($request->is('pay/weekly')) {
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            }elseif($request->is('pay/monthly')) {
                $selectPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();   
            }elseif($request->is('pay/yearly')) {
                $selectPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();   
            }
            if($selectPlan) {
                $successURL = URL::signedRoute('payment.success',[
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);

                // dd($successURL);

                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'product_data' => [
                                'name' => $selectPlan['name'],
                                'description' => $selectPlan['description'],
                            ],
                            'unit_amount' => $selectPlan['amount'] * 100,
                            'currency' => $selectPlan['currency'],
                        ],
                        'quantity' => $selectPlan['quantity'],
                    ]],
                    'mode' => 'payment', 
                    'success_url' => $successURL,
                    'cancel_url' => route('payment.cancel')
                ]);

                return redirect($session->url);
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function paymentSuccess(Request $request)
    {
        $plan = $request->plan;
        $billingEnds = $request->billing_ends;
        User::where('id', auth()->user()->id)->update([
            'plan' => $plan,
            'billing_ends' => $billingEnds,
            'status' => 'paid'
        ]);

        return redirect()->route('dashboard')->with('success','Payment was successfully processed');

    }

    public function cancel()
    {
        return redirect()->route('dashboard')->with('error','Payment was unsuccessful!');

    }
}
