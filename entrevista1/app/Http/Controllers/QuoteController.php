<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;


class QuoteController extends Controller
{

    public function quoteView()
    {

        return view('pages.frases.frases', [
            'findCategory' => Category::all(),
            'findQuote' => Quote::orderBy('created_at', 'DESC')->simplePaginate(5),
        ]);
    }

    public function createQuoteView()
    {

        $findCategory = Category::all();
        return view('pages.frases.createFrases', compact('findCategory'));
    }


    public function createQuote(Request $request)
    {
        Quote::create([
            'category_id' => $request->category_id,
            'text' => $request->text,
        ]);

        return redirect()->route('index.frases')->with('success', 'Frase criada com sucesso!');
    }


    public function deleteQuote(Request $request)
    {
        $findQuote = Quote::find($request->id);
        $findQuote->delete();
        return redirect()->route('index.frases')->with('success', 'Frase deletada com sucesso!');
    }
}
