<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class,'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('settingmaster.role.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permissions::all();
        return view('settingmaster.role.create',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role'=>'required|string|max:50',
            'permission'=>'array'
        ]);
        $role = Role::Create($request->all());
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        $permissions = Permissions::all();
        if ($role->id == 1){
            return abort(403);
        }
        return view('settingmaster.role.show',['role'=>$role,'permissions'=>$permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
//        dd($request);
        if ($role->id == 1){
            return abort(403);
        }
        $this->validate($request,[
            'role'=>'required|string|max:50',
            'permission'=>'array'
        ]);
        Role::where('id',$role->id)
            ->update([
                'role'=>$request->role,
            ]);
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        if ($role->id == 1 || $role->id == 2 || $role->id == 3){
            return abort(403);
        }
        $role::where('id', $role->id);
        $role->delete();
        return redirect()->route('role.index')->with('status', 'Berhasil menghapus data');
    }
}
