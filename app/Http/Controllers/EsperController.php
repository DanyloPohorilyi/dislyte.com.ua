<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Equipment;
use App\Models\EquipmentAdvice;
use App\Models\Esper;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EsperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espers = Esper::all();
        return view('admin.espers.index', ['espers' => $espers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elements = Element::all();
        $equipments_4set = Equipment::where('number_sets', 4)->get();
        $equipments_2set = Equipment::where('number_sets', 2)->get();


        return view('admin.espers.add', ['elements' => $elements, 'eq_2' => $equipments_2set, 'eq_4' => $equipments_4set]);
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
            'sprite1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
            'god' => 'required|string|max:255',
            'rarity' => 'required|string|in:rare,epic,legendary',
            'element' => 'required|exists:elements,id',
            'role' => 'required|string|in:fighter,support,defender,controller',
            'short_description' => 'nullable|string|max:250',
            'quote' => 'nullable|string|max:150',
            'age' => 'required|integer|min:0',
            'birthday' => 'nullable|date_format:"F j, Y"',
            'height' => 'nullable|string|max:255',
            'favorites' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'gameAdvice' => 'nullable|string',
            'adviceName1' => 'required|string|max:255',
            'equipmentSetFour1' => 'required',
            'equipmentSetFour1.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo1' => 'required',
            'equipmentSetTwo1.*' => 'exists:equipment_sets,id',
            'advice_description1' => 'required|string',
            'stats11' => 'required',
            'stats11.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats12' => 'required',
            'stats12.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats13' => 'required',
            'stats13.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',

            'adviceName2' => 'required|string|max:255',
            'equipmentSetFour2' => 'required',
            'equipmentSetFour2.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo2' => 'required',
            'equipmentSetTwo2.*' => 'exists:equipment_sets,id',
            'advice_description2' => 'required|string',
            'stats21' => 'required',
            'stats21.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats22' => 'required',
            'stats22.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats23' => 'required',
            'stats23.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',

            'adviceName3' => 'required|string|max:255',
            'equipmentSetFour3' => 'required',
            'equipmentSetFour3.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo3' => 'required',
            'equipmentSetTwo3.*' => 'exists:equipment_sets,id',
            'advice_description3' => 'required|string',
            'stats31' => 'required',
            'stats31.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats32' => 'required',
            'stats32.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats33' => 'required',
            'stats33.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority1' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority2' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority3' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority4' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority5' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority6' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'sprite2Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'iconImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'resonanceImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $recommendEquipment1 = new EquipmentAdvice();
        $recommendEquipment1->name = $request->adviceName1;
        $recommendEquipment1->description = $request->advice_description1;
        $recommendEquipment1->fourRelics()->associate(Equipment::find($request->equipmentSetFour1));
        $recommendEquipment1->twoRelics()->associate(Equipment::find($request->equipmentSetTwo1));
        $stats11 = $request->input('stats11');
        $stats12 = $request->input('stats12');
        $stats13 = $request->input('stats13');

        $statsJson1 = [
            'headphone' => $stats11,
            'ring' => $stats12,
            'boots' => $stats13,
        ];

        $recommendEquipment1->setStatsToUpgradeAttribute($statsJson1);
        $recommendEquipment1->save();

        $recommendEquipment2 = new EquipmentAdvice();
        $recommendEquipment2->name = $request->adviceName2;
        $recommendEquipment2->description = $request->advice_description2;
        $recommendEquipment2->fourRelics()->associate(Equipment::find($request->equipmentSetFour2));
        $recommendEquipment2->twoRelics()->associate(Equipment::find($request->equipmentSetTwo2));
        $stats21 = $request->input('stats21');
        $stats22 = $request->input('stats22');
        $stats23 = $request->input('stats23');

        $statsJson2 = [
            'headphone' => $stats21,
            'ring' => $stats22,
            'boots' => $stats23,
        ];

        $recommendEquipment2->setStatsToUpgradeAttribute($statsJson2);
        $recommendEquipment2->save();

        $recommendEquipment3 = new EquipmentAdvice();
        $recommendEquipment3->name = $request->adviceName3;
        $recommendEquipment3->description = $request->advice_description3;
        $recommendEquipment3->fourRelics()->associate(Equipment::find($request->equipmentSetFour3));
        $recommendEquipment3->twoRelics()->associate(Equipment::find($request->equipmentSetTwo3));
        $stats31 = $request->input('stats31');
        $stats32 = $request->input('stats32');
        $stats33 = $request->input('stats33');

        $statsJson3 = [
            'headphone' => $stats31,
            'ring' => $stats32,
            'boots' => $stats33,
        ];

        $recommendEquipment3->setStatsToUpgradeAttribute($statsJson3);
        $recommendEquipment3->save();

        $sprite1 = new Image();
        $randomise = rand(1111111, 9999999);
        $extension = $request->file('sprite1')->getClientOriginalExtension();
        $filename = strtolower($request->name) . '_' . $randomise . '.' . $extension;
        $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
        $request->file('sprite1')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
        $sprite1->path = '/images/espers/' . $normalized_name . '/' . $filename;
        $sprite1->alt = $request->name . ' (' . $request->god . ')';
        $sprite1->caption = 'Sprite 1: ' . $request->name . ' (' . $request->god . ')';
        $sprite1->save();



        $icon = new Image();
        $randomise = rand(1111111, 9999999);
        $extension = $request->file('iconImage')->getClientOriginalExtension();
        $filename = strtolower($request->name) . '_icon_' . $randomise . '.' . $extension;
        $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
        $request->file('iconImage')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
        $icon->path = '/images/espers/' . $normalized_name . '/' . $filename;
        $icon->alt = $request->name . ' (' . $request->god . ')';
        $icon->caption = 'Icon: ' . $request->name . ' (' . $request->god . ')';
        $icon->save();

        $resonance = new Image();
        $randomise = rand(1111111, 9999999);
        $extension = $request->file('resonanceImage')->getClientOriginalExtension();
        $filename = strtolower($request->name) . '_resonance_' . $randomise . '.' . $extension;
        $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
        $request->file('resonanceImage')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
        $resonance->path = '/images/espers/' . $normalized_name . '/' . $filename;
        $resonance->alt = $request->name . ' (' . $request->god . ') Full Resonance Art';
        $resonance->caption = 'Full Resonance Art: ' . $request->name . ' (' . $request->god . ')';
        $resonance->save();

        $esper = new Esper();
        $esper->name = $request->name;
        $esper->god = $request->god;
        $esper->rarity = $request->rarity;
        $esper->element()->associate(Element::find($request->element));
        $esper->role = $request->role;
        $esper->short_description = $request->short_description;
        $esper->quote = $request->quote;
        $esper->age = $request->age;
        $esper->birthday = $request->birthday;
        $esper->height = $request->height;
        $esper->favorites = json_encode(['favorites' => $request->favorites]);
        $esper->job = $request->job;
        $esper->affiliation = $request->affiliation;
        $esper->game_advice = $request->gameAdvice;
        $substatPriorities = [
            'substatPriority1' => $request->input('substatPriority1'),
            'substatPriority2' => $request->input('substatPriority2'),
            'substatPriority3' => $request->input('substatPriority3'),
            'substatPriority4' => $request->input('substatPriority4'),
            'substatPriority5' => $request->input('substatPriority5'),
            'substatPriority6' => $request->input('substatPriority6'),
        ];

        $jsonDataPrior = json_encode($substatPriorities);
        $esper->to_upgrade_stats = $jsonDataPrior;
        $esper->equipmentAdvice1()->associate($recommendEquipment1);
        $esper->equipmentAdvice2()->associate($recommendEquipment2);
        $esper->equipmentAdvice3()->associate($recommendEquipment3);

        $esper->sprite1()->associate($sprite1);
        if ($request->hasFile('sprite2Image') && $request->file('sprite2Image')->isValid()) {
            $sprite2 = new Image();
            $randomise = rand(1111111, 9999999);
            $extension = $request->file('sprite2Image')->getClientOriginalExtension();
            $filename = strtolower($request->name) . '_' . $randomise . '.' . $extension;
            $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
            $request->file('sprite2Image')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
            $sprite2->path = '/images/espers/' . $normalized_name . '/' . $filename;
            $sprite2->alt = $request->name . ' (' . $request->god . ')';
            $sprite2->caption = 'Sprite 2: ' . $request->name . ' (' . $request->god . ')';
            $sprite2->save();
            $esper->sprite2()->associate($sprite2);
        }
        $esper->icon()->associate($icon);
        $esper->resonanceImg()->associate($resonance);
        $esper->save();
        return redirect(route('espers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function show(Esper $esper)
    {
        $elements = Element::all();
        $equipments_4set = Equipment::where('number_sets', 4)->get();
        $equipments_2set = Equipment::where('number_sets', 2)->get();
        $equipAdvice1 = EquipmentAdvice::find($esper->equipmentAdvice1->id);
        $statsToUpgrade1 = $equipAdvice1->stats_to_upgrade;

        $equipAdvice2 = EquipmentAdvice::find($esper->equipmentAdvice2->id);
        $statsToUpgrade2 = $equipAdvice2->stats_to_upgrade;
        $favorites = json_decode($esper->favorites, true);
        $equipAdvice3 = EquipmentAdvice::find($esper->equipmentAdvice3->id);
        $statsToUpgrade3 = $equipAdvice3->stats_to_upgrade;
        $priorityStats = json_decode($esper->to_upgrade_stats, true);

        return view('admin.espers.edit', [
            'esper' => $esper, 'eq_4' => $equipments_4set, 'eq_2' => $equipments_2set, 'elements' => $elements,
            'stats1' => $statsToUpgrade1, 'stats2' => $statsToUpgrade2, 'stats3' => $statsToUpgrade3,
            'priorityStats' => $priorityStats, 'favorites' => $favorites['favorites'], 'readonly' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function edit(Esper $esper)
    {
        $elements = Element::all();
        $equipments_4set = Equipment::where('number_sets', 4)->get();
        $equipments_2set = Equipment::where('number_sets', 2)->get();
        $equipAdvice1 = EquipmentAdvice::find($esper->equipmentAdvice1->id);
        $statsToUpgrade1 = $equipAdvice1->stats_to_upgrade;

        $equipAdvice2 = EquipmentAdvice::find($esper->equipmentAdvice2->id);
        $statsToUpgrade2 = $equipAdvice2->stats_to_upgrade;
        $favorites = json_decode($esper->favorites, true);
        $equipAdvice3 = EquipmentAdvice::find($esper->equipmentAdvice3->id);
        $statsToUpgrade3 = $equipAdvice3->stats_to_upgrade;
        $priorityStats = json_decode($esper->to_upgrade_stats, true);

        return view('admin.espers.edit', [
            'esper' => $esper, 'eq_4' => $equipments_4set, 'eq_2' => $equipments_2set, 'elements' => $elements,
            'stats1' => $statsToUpgrade1, 'stats2' => $statsToUpgrade2, 'stats3' => $statsToUpgrade3,
            'priorityStats' => $priorityStats, 'favorites' => $favorites['favorites'], 'readonly' => false
        ]);
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
        $validator = Validator::make($request->all(), [
            'sprite1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
            'god' => 'required|string|max:255',
            'rarity' => 'required|string|in:rare,epic,legendary',
            'element' => 'required|exists:elements,id',
            'role' => 'required|string|in:fighter,support,defender,controller',
            'short_description' => 'nullable|string|max:250',
            'quote' => 'nullable|string|max:150',
            'age' => 'required|integer|min:0',
            'birthday' => 'nullable|date_format:"F j, Y"',
            'height' => 'nullable|string|max:255',
            'favorites' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'gameAdvice' => 'nullable|string',
            'adviceName1' => 'required|string|max:255',
            'equipmentSetFour1' => 'required',
            'equipmentSetFour1.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo1' => 'required',
            'equipmentSetTwo1.*' => 'exists:equipment_sets,id',
            'advice_description1' => 'required|string',
            'stats11' => 'required',
            'stats11.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats12' => 'required',
            'stats12.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats13' => 'required',
            'stats13.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',

            'adviceName2' => 'required|string|max:255',
            'equipmentSetFour2' => 'required',
            'equipmentSetFour2.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo2' => 'required',
            'equipmentSetTwo2.*' => 'exists:equipment_sets,id',
            'advice_description2' => 'required|string',
            'stats21' => 'required',
            'stats21.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats22' => 'required',
            'stats22.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats23' => 'required',
            'stats23.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',

            'adviceName3' => 'required|string|max:255',
            'equipmentSetFour3' => 'required',
            'equipmentSetFour3.*' => 'exists:equipment_sets,id',
            'equipmentSetTwo3' => 'required',
            'equipmentSetTwo3.*' => 'exists:equipment_sets,id',
            'advice_description3' => 'required|string',
            'stats31' => 'required',
            'stats31.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats32' => 'required',
            'stats32.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'stats33' => 'required',
            'stats33.*' => 'in:ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority1' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority2' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority3' => 'required|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority4' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority5' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'substatPriority6' => 'nullable|in:none,Flat ATK,Flat HP,Flat DEF,ATK%,HP%,DEF%,C. RATE,C. DMG,SPD,RESIST,ACC',
            'sprite2Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'iconImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'resonanceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $equipmentAdvice1 = EquipmentAdvice::find($esper->equipmentAdvice1->id);
        $equipmentAdvice1->name = $request->adviceName1;
        $equipmentAdvice1->description = $request->advice_description1;
        $equipmentAdvice1->fourRelics()->associate(Equipment::find($request->equipmentSetFour1));
        $equipmentAdvice1->twoRelics()->associate(Equipment::find($request->equipmentSetTwo1));
        $stats11 = $request->input('stats11');
        $stats12 = $request->input('stats12');
        $stats13 = $request->input('stats13');

        $statsJson1 = [
            'headphone' => $stats11,
            'ring' => $stats12,
            'boots' => $stats13,
        ];

        $equipmentAdvice1->setStatsToUpgradeAttribute($statsJson1);
        $equipmentAdvice1->save();

        $equipmentAdvice2 = EquipmentAdvice::find($esper->equipmentAdvice2->id);
        $equipmentAdvice2->name = $request->adviceName2;
        $equipmentAdvice2->description = $request->advice_description2;
        $equipmentAdvice2->fourRelics()->associate(Equipment::find($request->equipmentSetFour2));
        $equipmentAdvice2->twoRelics()->associate(Equipment::find($request->equipmentSetTwo2));
        $stats21 = $request->input('stats21');
        $stats22 = $request->input('stats22');
        $stats23 = $request->input('stats23');

        $statsJson2 = [
            'headphone' => $stats21,
            'ring' => $stats22,
            'boots' => $stats23,
        ];

        $equipmentAdvice2->setStatsToUpgradeAttribute($statsJson2);
        $equipmentAdvice2->save();

        $equipmentAdvice3 = new EquipmentAdvice();
        $equipmentAdvice3->name = $request->adviceName3;
        $equipmentAdvice3->description = $request->advice_description3;
        $equipmentAdvice3->fourRelics()->associate(Equipment::find($request->equipmentSetFour3));
        $equipmentAdvice3->twoRelics()->associate(Equipment::find($request->equipmentSetTwo3));
        $stats31 = $request->input('stats31');
        $stats32 = $request->input('stats32');
        $stats33 = $request->input('stats33');

        $statsJson3 = [
            'headphone' => $stats31,
            'ring' => $stats32,
            'boots' => $stats33,
        ];

        $equipmentAdvice3->setStatsToUpgradeAttribute($statsJson3);
        $equipmentAdvice3->save();

        if ($request->hasFile('sprite1')) {
            // Deleting the previous image
            $previousImagePath = public_path($esper->sprite1->path);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload and save the new image
            $randomise = rand(1111111, 9999999);
            $extension = $request->file('sprite1')->getClientOriginalExtension();
            $filename = strtolower($request->name) . '_' . $randomise . '.' . $extension;
            $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
            $request->file('sprite1')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
            // Updating the item image information
            $esper->sprite1->path = '/images/espers/' . $normalized_name . '/' . $filename;
            $esper->sprite1->alt = $request->name . ' (' . $request->god . ')';
            $esper->sprite1->caption = 'Sprite 1: ' . $request->name . ' (' . $request->god . ')';
            $esper->sprite1->save();
        }
        if ($request->hasFile('iconImage')) {
            // Deleting the previous image
            $previousImagePath = public_path($esper->icon->path);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload and save the new image
            $randomise = rand(1111111, 9999999);
            $extension = $request->file('iconImage')->getClientOriginalExtension();
            $filename = strtolower($request->name) . '_icon_' . $randomise . '.' . $extension;
            $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
            $request->file('iconImage')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
            // Updating the item image information
            $esper->icon->path = '/images/espers/' . $normalized_name . '/' . $filename;
            $esper->icon->alt = $request->name . ' (' . $request->god . ')';
            $esper->icon->caption = 'Icon: ' . $request->name . ' (' . $request->god . ')';
            $esper->icon->save();
        }
        if ($request->hasFile('resonanceImage')) {
            // Deleting the previous image
            $previousImagePath = public_path($esper->resonanceImg->path);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload and save the new image
            $randomise = rand(1111111, 9999999);
            $extension = $request->file('resonanceImage')->getClientOriginalExtension();
            $filename = strtolower($request->name) . '_resonance_' . $randomise . '.' . $extension;
            $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
            $request->file('resonanceImage')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
            // Updating the item image information
            $esper->resonanceImg->path = '/images/espers/' . $normalized_name . '/' . $filename;
            $esper->resonanceImg->alt = $request->name . ' (' . $request->god . ') Full Resonance Art';
            $esper->resonanceImg->caption = 'Full Resonance Art: ' . $request->name . ' (' . $request->god . ')';
            $esper->resonanceImg->save();
        }

        $esper->name = $request->name;
        $esper->god = $request->god;
        $esper->rarity = $request->rarity;
        $esper->element()->associate(Element::find($request->element));
        $esper->role = $request->role;
        $esper->short_description = $request->short_description;
        $esper->quote = $request->quote;
        $esper->age = $request->age;
        $esper->birthday = $request->birthday;
        $esper->height = $request->height;
        $esper->favorites = json_encode(['favorites' => $request->favorites]);
        $esper->job = $request->job;
        $esper->affiliation = $request->affiliation;
        $esper->game_advice = $request->gameAdvice;
        $substatPriorities = [
            'substatPriority1' => $request->input('substatPriority1'),
            'substatPriority2' => $request->input('substatPriority2'),
            'substatPriority3' => $request->input('substatPriority3'),
            'substatPriority4' => $request->input('substatPriority4'),
            'substatPriority5' => $request->input('substatPriority5'),
            'substatPriority6' => $request->input('substatPriority6'),
        ];

        $jsonDataPrior = json_encode($substatPriorities);
        $esper->to_upgrade_stats = $jsonDataPrior;
        $esper->equipmentAdvice1()->associate($equipmentAdvice1);
        $esper->equipmentAdvice2()->associate($equipmentAdvice2);
        $esper->equipmentAdvice3()->associate($equipmentAdvice3);

        if ($request->hasFile('sprite2Image') && $request->file('sprite2Image')->isValid()) {
            if ($esper->sprite2 != null) {
                $previousImagePath = public_path($esper->sprite2->path);
                if (File::exists($previousImagePath)) {
                    File::delete($previousImagePath);
                }
                // Upload and save the new image
                $randomise = rand(1111111, 9999999);
                $extension = $request->file('sprite2Image')->getClientOriginalExtension();
                $filename = strtolower($request->name) . '_' . $randomise . '.' . $extension;
                $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
                $request->file('sprite2Image')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
                // Updating the item image information
                $esper->sprite2->path = '/images/espers/' . $normalized_name . '/' . $filename;
                $esper->sprite2->alt = $request->name . ' (' . $request->god . ')';
                $esper->sprite2->caption = 'Sprite 2: ' . $request->name . ' (' . $request->god . ')';
                $esper->sprite2->save();
            } else {
                $sprite2 = new Image();
                $randomise = rand(1111111, 9999999);
                $extension = $request->file('sprite2Image')->getClientOriginalExtension();
                $filename = strtolower($request->name) . '_' . $randomise . '.' . $extension;
                $normalized_name = strtolower(str_replace(' ', '_', $request->name . ' ' . $request->god));
                $request->file('sprite2Image')->move(public_path() . '/images/espers/' . $normalized_name, $filename);
                $sprite2->path = '/images/espers/' . $normalized_name . '/' . $filename;
                $sprite2->alt = $request->name . ' (' . $request->god . ')';
                $sprite2->caption = 'Sprite 2: ' . $request->name . ' (' . $request->god . ')';
                $sprite2->save();
                $esper->sprite2()->associate($sprite2);
            }
        }
        $esper->save();
        return redirect(route('espers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Esper  $esper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Esper $esper)
    {

        if (File::exists(public_path($esper->sprite1->path))) {
            File::delete(public_path($esper->sprite1->path));
        }

        if (File::exists(public_path($esper->icon->path))) {
            File::delete(public_path($esper->icon->path));
        }

        if (File::exists(public_path($esper->resonanceImg->path))) {
            File::delete(public_path($esper->resonanceImg->path));
        }

        if (isset($esper->sprite2)) {
            if (File::exists(public_path($esper->sprite2->path))) {
                File::delete(public_path($esper->sprite2->path));
            }
            $esper->sprite2()->delete();
        }
        $directory = dirname($esper->icon->path, 1);
        if (is_dir($directory)) {
            rmdir($directory);
        }
        $esper->equipmentAdvice1->delete();
        $esper->equipmentAdvice2->delete();
        $esper->equipmentAdvice3->delete();
        $esper->sprite1()->delete();
        $esper->icon()->delete();
        $esper->resonanceImg()->delete();
        $esper->delete();
        return redirect(route('espers.index'));
    }
}
