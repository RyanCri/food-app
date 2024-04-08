<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Type;
use App\Models\Icon;
use Auth;

class ItemController extends Controller
{
    public function index() {
        $items = Item::orderBy('name', 'asc')->paginate(8);
        
        return view('user.item.index', [
            'items' => $items,
        ]);
    }

    public function list(string $user_id) {
        $items = Item::where('user_id', $user_id)->get(); //gets all items where user_id is current user
        // dd();

        return view ('user.item.list', [
            'items' => $items,
        ]);
    }
    
    public function create() {
        $types = Type::all();
        $icons = Icon::all();
        
        return view ('user.item.itemCreate', [
            'types' => $types,
            'icons' => $icons,
        ]);
    }

    public function store(Request $request) {
        // dd($request);
        
        // validation rules
        $rules = [
            'name' => 'required|string|min:2|max:64',
            'expiry_date' => 'required|date|after:today',
            'icon_color' => 'required|hex_color',
        ];

        $messages = [
            'icon_color.hex_color' => 'Selection must be a valid color',
            'expiry_date.after:today' => 'Expiry date cannot be before today',
        ];

        $request->validate($rules, $messages);

        $item = new Item;
        $item->name = $request->name;
        $item->expiry_date = $request->expiry_date;
        $item->icon_color = $request->icon_color;
        $item->type_id = $request->type_id;
        $item->user_id = $request->user_id;
        $item->save();

        return redirect() ->route('user.item.index')->with('status', "{$item->name} added!");
    }

    public function show(string $id) {
        $item = Item::findOrFail($id);

        return view('user.item.itemShow', [
            'item' => $item
        ]);
    }

    public function edit(string $id) {

        $types = Type::all();
        $icons = Icon::all();

        $item = Item::findOrFail($id);
        return view('user.item.itemEdit', [
            'item' => $item,
            'types' => $types,
            'icons' => $icons,
        ]);
    }

    public function update(Request $request, string $id) {
        // validation rules
        $rules = [
            'name' => 'required|string|min:2|max:64',
            'expiry_date' => 'required|date|after:today',
            'icon_color' => 'required|hex_color',
            'type' => 'required|string',
        ];

        $messages = [
            'icon_color.hex_color' => 'Selection must be a valid color',
            'expiry_date.after:today' => 'Expiry date cannot be before today',
        ];

        $request->validate($rules, $messages);

        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->expiry_date = $request->expiry_date;
        $item->icon_color = $request->icon_color;
        $item->type_id = $request->type_id;
        $item->user_id = $request->user_id;
        $item->save();

        return redirect() ->route('user.item.index')->with('status', "Edited {$item->name}!");
    }

    public function destroy(string $id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect() ->route('user.item.index')->with('status', "{$item->name} deleted successfully!");
    }
}
