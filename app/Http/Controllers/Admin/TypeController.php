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
}
