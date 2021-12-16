<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\IstanbulCard;
use App\Http\Requests\StoreIstanbulCardRequest;
use App\Http\Requests\UpdateIstanbulCardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IstanbulCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $IstCards = Card::where('card_type', 'istanbul_card')->get();
        return view('cards.istanbul.index', compact('IstCards'));
//        $s_card = DB::table('cards')->where('card_type', 'istanbul_card')->get();
//        return view('cards.istanbul', ['card' => $s_card]);
        // return view('cards.istanbul');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreIstanbulCardRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIstanbulCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\IstanbulCard $istanbulCard
     * @return \Illuminate\Http\Response
     */
    public function show(IstanbulCard $istanbulCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\IstanbulCard $istanbulCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $card = Card::find($id);
        return view('cards.istanbul.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateIstanbulCardRequest $request
     * @param \App\Models\IstanbulCard $istanbulCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIstanbulCardRequest $request, IstanbulCard $istanbulCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\IstanbulCard $istanbulCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(IstanbulCard $istanbulCard)
    {
        //
    }

    public function cut_ist_amount(Request $request)
    {
        //dd($request->all());
        $vehicle_type = $request->vehicle_type;
        $customer_id = $request->customer_id;
        $customer_type = $request->customer_type;
        $balance = $request->balance;
        $vehicle_type = $request->vehicle_type;
        $transfer_number = $request->transfer_number;
        $amount = $request->amount;
        $card_number = $request->card_number;
        //dd($card_number);
        try {
            $el_card = Card::where('number', $card_number)->firstOrFail();

            if (Str::lower($vehicle_type) == 'bus') {
                if (Str::lower($customer_type) == 'teacher') {
                    if (Str::lower($transfer_number) == 0) {
                        $el_card->balance -= 1.85;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.85 TL ');
                    } elseif (Str::lower($transfer_number) == 1) {
                        $el_card->balance -= 1.10;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.10 TL ');
                    } elseif (Str::lower($transfer_number) == 2) {
                        $el_card->balance -= 0.85;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.85 TL ');
                    } elseif (Str::lower($transfer_number) >= 3) {
                        $el_card->balance -= 0.55;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.55 TL ');
                    }
                } elseif (Str::lower($customer_type) == 'student') { // if student
                    if (Str::lower($transfer_number) == 0) {
                        $el_card->balance -= 1.25;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.25 TL ');
                    } elseif (Str::lower($transfer_number) == 1) {
                        $el_card->balance -= 0.55;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.55 TL ');
                    } elseif (Str::lower($transfer_number) == 2) {
                        $el_card->balance -= 0.50;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.50 TL ');
                    } elseif (Str::lower($transfer_number) >= 3) {
                        $el_card->balance -= 0.45;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.45 TL ');
                    }
                } else { // if full fare
                    if (Str::lower($transfer_number) == 0) {
                        $el_card->balance -= 2.6;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 2.6 TL ');
                    } elseif (Str::lower($transfer_number) == 1) {
                        $el_card->balance -= 1.85;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.85 TL ');
                    } elseif (Str::lower($transfer_number) == 2) {
                        $el_card->balance -= 1.40;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.40 TL ');
                    } elseif (Str::lower($transfer_number) >= 3) {
                        $el_card->balance -= 0.9;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 0.90 TL ');
                    }
                }


            } elseif (Str::lower($vehicle_type) == 'metrobus') { // if vehicle_type = metrobus
                if (Str::lower($customer_type) == 'teacher') {
                    if (Str::lower($transfer_number) <= 3) {

                        $el_card->balance -= 1.45;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.45 TL Because You Are Teacher And Toke Metro Bus For 1-3 Stops ');
                    } elseif (Str::lower($transfer_number) <= 9
                        //4 || 5 || 6 || 7 || 8 || 9
                    ) {
                        $el_card->balance -= 1.85;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.85 TL Because You Are Teacher And Toke Toke Metro Bus For 4-9 Stops');
                    } elseif
                    (Str::lower($transfer_number) <= 15) {
                        $el_card->balance -= 1.9;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.9 TL Because You Are Teacher And Toke Metro Bus For 10-15 Stops ');
                    } elseif
                    (Str::lower($transfer_number) <= 27) {
                        $el_card->balance -= 2;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 2 Because You Are Teacher And Toke Metro Bus For 16-27 Stops ');
                    } elseif
                    (Str::lower($transfer_number) >= 28) {
                        $el_card->balance -= 2.10;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 2.10 Because You Are Teacher And Toke Metro Bus More Than 28 Stops');
                    }
                } elseif (Str::lower($customer_type) == 'student') { // if student
                    if (Str::lower($transfer_number) <= 3) {

                        $el_card->balance -= 1.10;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.10 TL Because You Are Student And Toke Metro Bus For 1-3 Stops ');
                    } elseif (Str::lower($transfer_number) <= 9) {
                        $el_card->balance -= 1.20;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.20 TL Because You Are Student And Toke Metro Bus For 4-9 Stops');
                    } elseif
                    (Str::lower($transfer_number) <= 15) {
                        $el_card->balance -= 1.25;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.25 TL Because You Are Student And Toke Metro Bus More Than 10 Stops ');
                    }
                } else { // if full fare
                    if (Str::lower($transfer_number) <= 3) {
                        $el_card->balance -= 1.95;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1.95 TL Because You Toke Metro Bus For 1-3 Stops ');
                    } elseif (Str::lower($transfer_number) <= 9) {
                        $el_card->balance -= 3;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3 TL Because You Toke Metro Bus For 4-9 Stops');
                    } elseif
                    (Str::lower($transfer_number) <= 15) {
                        $el_card->balance -= 3.25;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3.25 TL Because You Toke Metro Bus For 10-15 Stops ');
                    } elseif
                    (Str::lower($transfer_number) <= 21) {
                        $el_card->balance -= 3.40;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3.40 TL Because You Toke Metro Bus For 16-21 Stops ');
                    } elseif
                    (Str::lower($transfer_number) <= 27) {
                        $el_card->balance -= 3.50;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3.50 Because You Metro Bus For 22-27 Stops ');
                    } elseif
                    (Str::lower($transfer_number) <= 33) {
                        $el_card->balance -= 3.60;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3.60 Because You Metro Bus For 28-33 Stops ');
                    } elseif
                    (Str::lower($transfer_number) > 33) {
                        $el_card->balance -= 3.85;
                        $el_card->save();
                        return redirect('istanbul')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 3.85 Because You Toke Metro Bus More Than 33 Stops');
                    }
                }
            }

            return response()->json($el_card->balance, 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
