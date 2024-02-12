<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('admin.equipment.index', ['equipments' => $equipments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = new Equipment();
        return view('admin.equipment.add', ['equipment' => $equipment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg'],
            'name' => ['required', 'string', 'max:255'],
            'numbers_sets' => ['required', Rule::in(['2', '4'])],
            'description' => ['required', 'string', 'max:1000'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = new Image();
        $randomise = rand(1111111, 9999999);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $randomise . '.' . $extension;
        $request->file('image')->move(public_path() . '/images/equipment', $filename);
        $image->path = 'images/equipment/' . $filename;
        $image->alt = $request->name;
        $image->caption = 'Equipment: ' . $request->name;
        $image->save();

        $equipment = new Equipment();
        $equipment->name = $request->name;
        $equipment->description = $request->description;
        $equipment->number_sets = $request->numbers_sets;
        $equipment->image()->associate($image);
        $equipment->save();
        return redirect('/equipment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        return view('admin.equipment.edit', ['equipment' => $equipment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['image', 'mimes:jpeg,png,jpg,svg'],
            'name' => ['required', 'string', 'max:255'],
            'numbers_sets' => ['required', Rule::in(['2', '4'])],
            'description' => ['required', 'string', 'max:1000'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('image')) {
            // Deleting the previous image
            $previousImagePath = public_path($equipment->image->path);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload and save the new image
            $randomise = rand(1111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomise . '.' . $extension;
            $request->file('image')->move(public_path('images/equipment'), $filename);

            // Updating the item image information
            $equipment->image->path = 'images/equipment/' . $filename;
            $equipment->image->alt = $request->name;
            $equipment->image->caption = 'Equipment: ' . $request->name;
            $equipment->image->save();
        }
        $equipment->name = $request->name;
        $equipment->description = $request->description;
        $equipment->number_sets = $request->numbers_sets;
        $equipment->save();

        return redirect(route('equipment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        if (File::exists(public_path($equipment->image->path))) {
            File::delete(public_path($equipment->image->path));
        }


        $equipment->image()->delete();
        $equipment->delete();

        return redirect(route('equipment.index'));
    }
}
