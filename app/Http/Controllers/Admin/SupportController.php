<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct() {

    }

    public function index(Request $request) 
    {
        $supports = Support::all();
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        // Support::find($id);
        // Support::where('id', $id)->first();
        // Support::where('id', '!=', $id)->first();
        if (!$support = Support::find($id)) {
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create() 
    {
        return view('admin.supports.create');
    }

    public function store(Request $request) 
    {
        dd($request->all());
    }
}
