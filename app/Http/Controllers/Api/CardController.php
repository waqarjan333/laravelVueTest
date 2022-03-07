<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Card;


class CardController extends Controller
{
    public function index()
    {
        $cards = Card::orderby('id', 'desc')->get();

        return response()->json($cards);
    }

    public function store(Request $request)
    {

        $card = Card::create($request->all());

        return response()->json([
            'status' => 'success',
            'card'   => $card
        ]);
    }

    public function show($id)
    {
        $card = Card::find($id);

        return response()->json($card);
    }

    public function update(Request $request, $id)
    {
        $card = Card::find($id);
        $card->update($request->all());

        return response()->json([
            'status' => 'success',
            'post'   => $card
        ]);
    }

    public function destroy($id)
     {
         $card = Card::find($id);
         $card->delete();

         return response()->json('Card successfully deleted!');
     }
}
