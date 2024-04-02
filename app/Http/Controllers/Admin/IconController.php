<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Icon;

class IconController extends Controller
{
    public function index() {
        $icons = Icon::orderBy('name', 'asc')->paginate(8);
        
        return view('admin.icon.index', [
            'icons' => $icons,
        ]);
    }

    public function create() {
        return view ('admin.icon.iconCreate');
    }

    public function store(Request $request) {
        // dd($request);
        
        // validation rules
        $rules = [
            'name' => 'required|string|min:2|max:64',
            'svg' => 'image|mimes:svg',
            'default_color' => 'required|hex_color',
        ];

        $messages = [
            'default_color.hex_color' => 'Selection must be a valid color',
            'svg.mimes:svg' => 'File must be an SVG file'
        ];

        $request->validate($rules, $messages);

        $icon = new Icon;
        $icon->name = $request->name;
        $icon->svg = $request->svg;
        if ($request->svg) {
            $imageName = time().'.'.$request->svg->extension();
            Storage::putFileAs('public/images', $request->svg,  $imageName);
            $icon->svg = $imageName;
        }
        $icon->default_color = $request->default_color;
        $icon->save();

        return redirect() ->route('admin.icon.index')->with('status', "{$icon->name} added!");
    }

    public function show(string $id) {
        $icon = Icon::findOrFail($id);

        return view('admin.icon.iconShow', [
            'icon' => $icon
        ]);
    }

    public function edit(string $id) {
        $icon = Icon::findOrFail($id);

        return view('admin.icon.iconEdit', [
            'icon' => $icon
        ]);
    }

    public function update(Request $request, string $id) {
        $rules = [
            'name' => 'required|string|min:2|max:64',
            'svg' => 'image|mimes:svg',
            'default_color' => 'required|hex_color',        ];

        $request->validate($rules);

        $icon = new Icon;
        $icon->icon = $request->icon;
        $icon->save();

        return redirect() ->route('admin.icon.index')->with('status', "Edited {$icon->name}!");
    }

    public function destroy(string $id) {
        $icon = Icon::findOrFail($id);
        $icon->delete();

        return redirect() ->route('admin.icon.index')->with('status', "{$icon->name} deleted successfully!");
    }
}
