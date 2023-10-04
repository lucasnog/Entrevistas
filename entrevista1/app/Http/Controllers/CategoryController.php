<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function catView()
    {
        $findQuote = Quote::all();
        $findCategory = Category::all();
        return view('pages.category.index', compact('findCategory', 'findQuote'));
    }

    public function createCatView()
    {
        return view('pages.category.createCat');
    }

    public function createCat(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('index.categorias')->with('success', 'Categoria criada com sucesso!');
    }

    public function deleteCat(Request $request)
    {
        $categoryId = $request->id;
        Quote::where('category_id', $categoryId)->delete();

        Category::destroy($categoryId);
        return redirect()->route('index.categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
