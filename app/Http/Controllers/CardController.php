<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function index()
    {
        $cards = Card::all();
        return view('cards.dash.index', compact('cards'));
    }

    public function create()
    {
        return view('cards.dash.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
        ]);
        Card::create($request->all());
        return redirect()->route('cards.dash.index')
            ->with('success', 'card created successfully.');
    }

    public function show($id)
    {
        $card = Card::find($id);

        return view('cards.dash.show', compact('card'));
    }

    public function edit($id)
    {
        $card = Card::find($id);
        return view('cards.dash.edit', compact('card'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'number' => 'required'
        ]);

        $card = Card::find($id);
        $card->number = $request['number'];
        $card->save();

        return redirect()->route('cards.dash.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(card $card)
    {
        $card->delete();
        return redirect()->route('cards.dash.index')
            ->with('success', 'Product deleted successfully');
    }

}
