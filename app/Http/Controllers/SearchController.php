<?php

namespace App\Http\Controllers;

use App\Models\Esper;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $espers = Esper::where('name', 'LIKE', $name . '%')->get();

        return view('admin.espers.index', ['espers' => $espers]);
    }
}
