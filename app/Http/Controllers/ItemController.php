<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        return Item::create($request->all());
    }

    public function show(Item $item)
    {
        return Item::find($item);
    }

    public function update(Request $request, Item $item)
    {
        if($request->name) {
            $slug = Str::slug($request->name);
            $request->merge(['slug' => $slug]);
        }

        $item = Item::find($item->id);
        $item->update($request->all());
        return $item;
    }

    public function destroy(Item $item)
    {
        $item = Item::find($item);
        return Item::destroy($item);
    }

    public function search($string)
    {        
        $item = Item::where('name', 'like', '%' . $string . '%')->orWhere('description', 'like', '%' . $string . '%')
        ->orWhere('slug', 'like', '%' . $string . '%')->orWhere('created_at', 'like', '%' . $string . '%')->get();
        
        return $item;
    }
}
