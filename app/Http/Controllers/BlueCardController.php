<?php

namespace App\Http\Controllers;

use app\models\interfaces\BusStrategy;
use App\Models\BlueCard;
use App\Models\Card;
use App\Http\Requests\StoreBlueCardRequest;
use App\Http\Requests\UpdateBlueCardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlueCardController extends Controller
{
    //    /**
    //     * Display a listing of the resource.
    //     *
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function index()
    //    {
    //        //
    //        //$card = DB::select('select * from cards');
    //        $card = DB::table('cards')->where('card_type', 'blue_card')->get();
    //        return view('cards.blue', ['card' => $card]);
    //        //Card = $BlueCards::all();
    //
    //        //       return card::all();
    //
    //        // return view('blue')->with(cards);
    //
    //        //compact
    //        //return view("cards.blue");
    //    }
    //
    //    public function calc(BlueCard $blueCard)
    //    {
    //        //
    //        // if bus or metrobus && >3 stops take -1 else take -2 and update and sow -1 or-2
    //
    ////        $card = DB::table('cards')->where('card_type', 'blue_card')->get();
    ////        if ($card . vehicle_type == bus || metrobus)
    ////            return console . log('hello from function');
    ////        else
    ////            return ('ert');
    //
    //    }
    //
    //    /**
    //     * Show the form for creating a new resource.
    //     *
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function create()
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Store a newly created resource in storage.
    //     *
    //     * @param \App\Http\Requests\StoreBlueCardRequest $request
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function store(StoreBlueCardRequest $request)
    //    {
    //        //
    //
    //
    //    }
    //
    //    /**
    //     * Display the specified resource.
    //     *
    //     * @param \App\Models\BlueCard $blueCard
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function show(BlueCard $blueCard)
    //    {
    //        //
    //
    //
    //    }
    //
    //    /**
    //     * Show the form for editing the specified resource.
    //     *
    //     * @param \App\Models\BlueCard $blueCard
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function edit(BlueCard $blueCard)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Update the specified resource in storage.
    //     *
    //     * @param \App\Http\Requests\UpdateBlueCardRequest $request
    //     * @param \App\Models\BlueCard $blueCard
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function update(UpdateBlueCardRequest $request, BlueCard $blueCard)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Remove the specified resource from storage.
    //     *
    //     * @param \App\Models\BlueCard $blueCard
    //     * @return \Illuminate\Http\Response
    //     */
    //    public function destroy(BlueCard $blueCard)
    //    {
    //        //
    //    }


    public function index()
    {
        $blueCards = Card::where('card_type', 'blue_card')->get();
        return view('cards.blue.index', compact('blueCards'));
    }

    public function create()
    {
        return view('cards.blue.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'card_type' => 'required',
            'balance' => 'required',
            'vehicle' => 'required',
            'customer_type' => 'required',
            'updated_at' => 'required',
        ]);
        Card::create($request->all());
        return redirect()->route('cards.blue.index')
            ->with('success', 'card created successfully.');
    }

    public function show($id)
    {
        $card = Card::find($id);

        return view('cards.blue.show', compact('card'));
    }

    public function edit($id)
    {
        $card = Card::find($id);
        return view('cards.blue.edit', compact('card'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'number' => 'required',
            'card_type' => 'required',
            'balance' => 'required',
            'vehicle' => 'required',
            'customer_type' => 'required',
            'updated_at' => 'required',
        ]);

        $card = Card::find($id);
        $card->number = $request['number'];
        // you need to write the function here before save // ok
        $card->$card->save();

        return redirect()->route('cards.blue.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(card $card)
    {
        $card->delete();
        return redirect()->route('cards.blue.index')
            ->with('success', 'Product deleted successfully');
    }

//    public function cut_amount(Request $request)
//    {
//        //dd($request->all());
//        $vehicle_type = $request->vehicle_type;
//        $customer_id = $request->customer_id;
//        $customer_type = $request->customer_type;
//        $balance = $request->balance;
//        $transfer_number = $request->transfer_number;
//        $amount = $request->amount;
//        $card_number = $request->card_number;
//        //dd($card_number);
//        try {
//            $card = Card::where('number', $card_number)->firstOrFail();
////            if (Str::lower($vehicle_type) == ('Bus' || 'MetroBus') && Str::lower($customer_type) == ('teacher' || 'student')
////                && Str::lower($transfer_number) <= 3) {
////                $card->balance -= 1; // here the amount you need to extract
////                $card->save();
////
////                return
////                    //response()->json($card->balance, 200);
////                    redirect('blue')->
////                    with('success', 'Your Balance Has Changed Successfully, We Cut 1 Point ');
////            }
////            // here you will continue all the conditions then do the direct
////            //return redirect()->route('cards.blue.index')
////            //->with('success', 'Product updated successfully');
////            $card->balance -= 2; // here the amount you need to extract
////            $card->save();
////            return redirect('blue')->
////            with('success', 'Your Balance Has Changed Successfully, We Cut 2 Point ');
////            // return response()->json($card->balance, 200);
////            // return response()->json($card, 200);
//
//            if (Str::lower($vehicle_type) === 'bus') {
//                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
//                    if (Str::lower($transfer_number) >= 0) {
//                        $card->balance -= 1;
//                        $card->save();
//                        return redirect('blue')->
//                        with('success', 'Your Balance Has Changed Successfully,
//                    We Cut 1 Point Because You Toke Bus ');
//                    }
//                    ddd('break1');
//                }
//                ddd('break');
//            } elseif (Str::lower($vehicle_type) === 'metrobus') {
//                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
//                    if (Str::lower($transfer_number) <= 3) {
//                        $card->balance -= 1;
//                        $card->save();
//                        return redirect('blue')->
//                        with('success', 'Your Balance Has Changed Successfully, We Cut 1 Points Because You Toke Metro Bus Less Than 3 Stops ');
//
//                    } else {
//                        $card->balance -= 2;
//                        $card->save();
//                        return redirect('blue')->
//                        with('success', 'Your Balance Has Changed Successfully, We Cut 2 Points Because You Toke Metro Bus More Than 3 Stops ');
//                    }
//                }
//            }
//        } catch (\Exception $e) {
//            return $e->getMessage();
//        }
//    }
}





