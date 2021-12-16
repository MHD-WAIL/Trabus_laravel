<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\ElectronicCard;
use App\Http\Requests\StoreElectronicCardRequest;
use App\Http\Requests\UpdateElectronicCardRequest;
use App\resources\views\cards\electronic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Str;

//cards\electronic;

class ElectronicCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $e_cards = Card::where('card_type', 'electronic_card')->get();
        return view('cards.electronic.index', compact('e_cards'));

//        $e_card = DB::table('cards')->where('card_type', 'electronic_card')->get();
//        return view('cards.electronic', ['card' => $e_card]);
        // return view('cards.electronic');
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
     * @param \App\Http\Requests\StoreElectronicCardRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectronicCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ElectronicCard $electronicCard
     * @return \Illuminate\Http\Response
     */
    public function show(ElectronicCard $electronicCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ElectronicCard $electronicCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $card = Card::find($id);
        return view('cards.electronic.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateElectronicCardRequest $request
     * @param \App\Models\ElectronicCard $electronicCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElectronicCardRequest $request, ElectronicCard $electronicCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ElectronicCard $electronicCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElectronicCard $electronicCard)
    {
        //
    }

    public function cut_el_amount(Request $request)
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
            if (Str::lower($vehicle_type) === 'bus') {
                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
                    if (Str::lower($transfer_number) >= 0) {
                        $el_card->balance -= 1;
                        $el_card->save();
                        return redirect('electronic')->
                        with('success', 'Your Balance Has Changed Successfully,
                    We Cut 1 Point Because You Toke Bus ');
                    }
                    ddd('break1');
                }
                ddd('break');
            } elseif (Str::lower($vehicle_type) === 'metrobus') {
                if (Str::lower($customer_type) == 'teacher' or 'student' or 'FullFare') {
                    if (Str::lower($transfer_number) <= 3) {
                        $el_card->balance -= 1;
                        $el_card->save();
                        return redirect('electronic')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 1 Points Because You Toke Metro Bus More Less 3 Stops ');

                    } else {
                        $el_card->balance -= 2;
                        $el_card->save();
                        return redirect('electronic')->
                        with('success', 'Your Balance Has Changed Successfully, We Cut 2 Points Because You Toke Metro Bus More Than 3 Stops ');
                    }
                }
            }


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
