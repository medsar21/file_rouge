<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingLists = auth()->user()->shoppingLists;
        $totalPrice = auth()->user()->shoppingLists()->sum('price');
        return view('shopping-list.index', compact('shoppingLists', 'totalPrice'));
    }

    public function store(Request $request)
    {
        auth()->user()->shoppingLists()->create($request->all());
        return redirect()->route('shopping-list.index');
    }

    public function destroy(ShoppingList $shoppingList)
    {
        $shoppingList->delete();
        return redirect()->route('shopping-list.index');
    }

    public function create()
    {
        return view('shopping-list.create');
    }
}