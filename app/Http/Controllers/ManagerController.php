<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
        return view('admin.manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = Manager::all();
        $managerIds = $managers->pluck('user_id');

        $users = User::whereNotIn('id', $managerIds)->get();

        return view('admin.manager.add', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manager = new Manager();
        $manager->user()->associate(User::find($request->users));
        $manager->setRole($request->role);
        $manager->can_create = $request->has('creating');
        $manager->can_edit = $request->has('editing');
        $manager->can_delete = $request->has('deleting');
        $manager->save();

        return redirect(route('managers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $managers = Manager::all();
        $managerIds = $managers->pluck('user_id');

        $users = User::whereNotIn('id', $managerIds)->get();
        $users->add($manager->user);
        return view('admin.manager.edit', ['manager' => $manager, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager->user()->disassociate();
        $manager->user()->associate(User::find($request->users));
        $manager->setRole($request->role);
        $manager->can_create = $request->has('creating');
        $manager->can_edit = $request->has('editing');
        $manager->can_delete = $request->has('deleting');
        $manager->save();

        return redirect(route('managers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->user()->disassociate();
        $manager->delete();
        return redirect(route('managers.index'));
    }
}
