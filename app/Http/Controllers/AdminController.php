<?php

namespace App\Http\Controllers;

use App\Models\Esper;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user_count = User::all()->count();
        $esper_count = Esper::all()->count();
        $top6_esper = Esper::all()->take(6);
        return view('admin.index', ['user_count' => $user_count, 'esper_count' => $esper_count, 'espers' => $top6_esper]);
    }
}
