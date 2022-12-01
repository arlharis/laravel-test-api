<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        return response(Item::all());
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $item = Item::create($request->all());

        return response($item, 201);
    }

    public function show(Item $item)
    {
        $item = Item::find($item);

        return response($item);
    }

    public function update(Request $request, Item $item)
    {
        if($request->name) {
            $slug = Str::slug($request->name);
            $request->merge(['slug' => $slug]);
        }

        $item = Item::find($item->id);
        $item->update($request->all());

        return response($item, 202);
    }

    public function destroy(Item $item)
    {
        $item = Item::find($item);
        Item::destroy($item);

        return response([
            'messages' => 'Item has succesfully deleted'
         ], 202);
    }

    public function search($keyword)
    {        
        $item = Item::where('name', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%')
        ->orWhere('slug', 'like', '%' . $keyword . '%')->orWhere('created_at', 'like', '%' . $keyword . '%')->get();
        
        return response($item);
    }
}
