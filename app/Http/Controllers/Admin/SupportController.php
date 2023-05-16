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

    public function edit(Support $support, string|int $id)
    {
        if (!$support = Support::where('id', $id)->first()) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, Support $support, string $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        $support->update($request->only([
            'subject', 'body'
        ]));

        return redirect()->route('support.index');
    }
}
