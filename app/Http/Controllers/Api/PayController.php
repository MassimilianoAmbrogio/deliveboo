<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway as Gateway;
use App\Order;
use Dotenv\Result\Result;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    public function pay(Request $request) {
        $data = $request->all();
        $slug = $data['slug'];
        
        // dd($data);
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xyg6km7tjcfh5hkh',
            'publicKey' => 'qghn6r3vsw6tqbbp',
            'privateKey' => '7b394a59ad46848440f8dc4171434f52'
        ]);

        $nonceFromTheClient = $data['payment_method_nonce'];

        $total= $data['amount'];

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
              'submitForSettlement' => False
            ]
        ]);

        if ($result->success) {
            $newOrder = new Order();

            $newOrder->fill($data);
            $saved = $newOrder->save();
            if ($saved) {
                foreach ($data['dishes'] as $key => $dish) {
                    if ($dish == 0) {
                        // \array_splice($data['dishes'], $key, 1);
                        // \array_splice($data['dishes_id'], $key, 1);
                        unset ($data['dishes'][$key]);
                        unset ($data['dishes_id'][$key]);
                    }
                }
                // dd($data['dishes']);
                // dd($data['dishes_id']);
                $newOrder->dishes()->attach($data['dishes_id'], ['time_order' => date('Y-m-d H:i:s')]);
                
                foreach ($data['dishes'] as $key => $quantity) {
                    DB::table('dish_order')
                        ->where('dish_id', $data['dishes_id'][$key])
                        ->where('order_id', $newOrder->id)
                        ->update(['quantity' => $quantity]);
                }
            }
            return redirect()->route('success');
        }
        else {
            $slug = $slug . '=failed';
            return redirect()->route('restaurants.show', $slug);
        }
    }
}
