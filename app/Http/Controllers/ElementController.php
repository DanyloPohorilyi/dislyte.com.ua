<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Element::all();


        return view('admin.elements.index', ['elements' => $elements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $element = new Element();
        return view('admin.elements.add', ['element' => $element]);
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
            'icon' => '|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $icon = new Image();
        $randomise = rand(1111111, 999999);
        $extension = $request->file('icon')->getClientOriginalExtension();
        $filename = $randomise . '.' . $extension;
        $request->file('icon')->move(public_path() . '/images/elements', $filename);
        $icon->path = 'images/elements/' . $filename;
        $icon->alt = $request->name;
        $icon->caption = 'Icon: ' . $request->name;
        $icon->save();

        $element = new Element();
        $element->name = $request->name;
        $element->image()->associate($icon);
        $element->save();
        return redirect('/elements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        return view('admin.elements.edit', ['element' => $element]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Element $element)
    {
        $validator = Validator::make($request->all(), [
            'icon' => '|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('icon')) {
            // Deleting the previous image
            $previousImagePath = public_path($element->image->path);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload and save the new image
            $randomise = rand(1111111, 999999);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $filename = $randomise . '.' . $extension;
            $request->file('icon')->move(public_path('images/elements'), $filename);

            // Updating the item image information
            $element->image->path = 'images/elements/' . $filename;
            $element->image->alt = $request->name;
            $element->image->caption = 'Icon: ' . $request->name;
            $element->image->save();
        }
        $element->name = $request->name;
        $element->save();
        return redirect()->route('elements.index')->with('success', 'Element updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {

        if (File::exists(public_path($element->image->path))) {
            File::delete(public_path($element->image->path));
        }

        $element->image()->delete();

        $element->delete();

        return redirect()->route('elements.index')->with('success', 'Element deleted successfully');
    }
}
