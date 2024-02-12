<?php

namespace App\Http\Controllers;

use App\Models\Esper;
use Illuminate\Http\Request;

class EsperGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legendary_esper = Esper::where('rarity', 'legendary')->get();
        $epic_esper = Esper::where('rarity', 'epic')->get();
        $rare_esper = Esper::where('rarity', 'rare')->get();
        return view('espers.index', ['legendary' => $legendary_esper, 'epic' => $epic_esper, 'rare' => $rare_esper]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function show(Esper $espersGallery)
    {
        $favorites = json_decode($espersGallery->favorites, true);
        $priorityStats = json_decode($espersGallery->to_upgrade_stats, true);
        return view('espers.show', ['esper' => $espersGallery, 'favorites' => $favorites['favorites'],  'priorityStats' => $priorityStats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function edit(Esper $esper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Esper $esper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Esper $esper)
    {
        //
    }
}
