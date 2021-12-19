<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class electronic extends TransportController
{
    public function cut_amount(Request $request)
    {
        //dd($request->all());
        $vehicle_type = $request->vehicle_type;
        $customer_id = $request->customer_id;
        $customer_type = $request->customer_type;
        $balance = $request->balance;
        $transfer_number = $request->transfer_number;
        $amount = $request->amount;
        $card_number = $request->card_number;
        try {
            $card = Card::where('number', $card_number)->firstOrFail();
            if (Str::lower($vehicle_type) === 'bus') {
                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
                    if (Str::lower($transfer_number) >= 0) {
                        $card->balance -= 1;
                        $card->save();
                        return redirect('blue')->
                        with('success', 'Your Balance Has Changed Successfully,
                    We Cut 1 Point Because You Toke Bus ');
                    }
                    ddd('break1');
                }
                ddd('break');
            } elseif (Str::lower($vehicle_type) === 'metrobus') {
                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
                    if (Str::lower($transfer_number) <= 3) {
                        $card->balance -= 1;
                        $card->save();
                        return redirect('blue')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1 Points Because You Toke Metro Bus Less Than 3 Stops ');

                    } else {
                        $card->balance -= 2;
                        $card->save();
                        return redirect('blue')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 2 Points Because You Toke Metro Bus More Than 3 Stops ');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
