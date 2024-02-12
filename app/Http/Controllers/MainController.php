<?php

namespace App\Http\Controllers;

use App\Models\Esper;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $clara = Esper::where('name', 'Clara')->first();
        $elliot = Esper::where('name', 'Elliot')->first();
        $gaius = Esper::where('name', 'Gaius')->first();
        $jiang_jiuli = Esper::where('god', 'Chiyou')->first();
        $leon = Esper::where('name', 'Leon')->first();
        $yuuhime = Esper::where('name', 'Yuuhime')->first();
        $luo_yan = Esper::where('name', 'Luo Yan')->first();
        $sally = Esper::where('name', 'Sally')->first();
        $espers = collect([$clara, $elliot, $gaius, $jiang_jiuli, $leon, $yuuhime, $luo_yan, $sally]);

        return view('index', ['espers' => $espers]);
    }

    public function blog()
    {
        return view('blog');
    }

    public function aboutUs()
    {
        return view('about');
    }
}
