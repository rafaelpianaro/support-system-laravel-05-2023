<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct() {

    }

    public function index(Request $request) {
        return view('admin.supports.index');
    }
}
