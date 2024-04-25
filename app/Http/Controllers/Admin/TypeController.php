<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Auth;

class TypeController extends Controller
{
    public function index() {
        $types = Type::orderBy('type', 'asc')->paginate(8);
        
        return view('admin.type.index', [
            'types' => $types,
        ]);
    }

    public function create() {
        return view ('admin.type.typeCreate');
    }

    public function store(Request $request) {
        $rules = [
            'type' => 'required|string|min:2|max:64',
        ];

        $request->validate($rules);

        $type = new Type;
        $type->type = $request->type;
        $type->save();

        return redirect() ->route('admin.type.index')->with('status', "{$type->type} added!");
    }

    public function show(string $id) {
        $type = Type::findOrFail($id);

        return view('admin.type.typeShow', [
            'type' => $type
        ]);
    }

    public function edit(string $id) {
        $type = Type::findOrFail($id);
        return view('admin.type.typeEdit', [
            'type' => $type
        ]);
    }

    public function update(Request $request, string $id) {
        $rules = [
            'type' => 'required|string|min:2|max:64',
        ];

        $request->validate($rules);

        $type = Type::findOrFail($id);
        $type->type = $request->type;
        $type->save();

        return redirect() ->route('admin.type.index')->with('status', "Edited {$type->type}!");
    }

    public function destroy(string $id) {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect() ->route('admin.type.index')->with('status', "{$type->type} deleted successfully!");
    }
}
