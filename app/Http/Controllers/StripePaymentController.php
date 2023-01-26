<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;

class StripePaymentController extends Controller
{
    function stripePayment(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            'card_number' => 'required',
            'expiry_date' => 'required',
            'card_ccv' => 'required',
            'amount' => 'required|max:'.$request->due,
            'invoice_id' => 'required'
        ]);

        // validator fails
        if($validator->fails()){
            flash()->addWarning('Please fill all the fields.');
            return redirect()->back();
        }else{
            Stripe::setApiKey(env('STRIPE_SECRET'));

            try{
                $token = Token::create([
                    'card' => [
                        'number' => $request->card_number,
                        'exp_month' => explode('/', $request->expiry_date)[0],
                        'exp_year' => explode('/', $request->expiry_date)[1],
                        'cvc' => $request->card_ccv
                    ],
                ]);
            }catch(\Exception $e){
                flash()->addWarning('Invalid Card Details!');
                return redirect()->back();
            }

            $charge = Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'source' => $token->id,
                'description' => "Payment for ".$request->invoice_id
            ]);

            Payment::create([
                'amount' => $request->amount,
                'invoice_id' => $request->invoice_id,
                'transaction_id' => $charge->id
            ]);

            flash()->addSuccess('Payment completd successfully!');
            return redirect()->back();
        }

        // return the client secret
    }
}
