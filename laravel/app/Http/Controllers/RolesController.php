<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\Perms;
use App\Models\Role_Perms;
use App\Models\User;
use App\Models\File;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        Roles::create([
            'id' => $request-$idr,
            'name' => $request-$name,
        ]);
        Perms::create([
            'id' => $request-$idp,
            'name' => $request-$name,
            'desc' => $request-$desc,
        ]);
        Role_perms::create([
            'role_id' => $request-$idr,
            'perm_id' => $request-$idp,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('users')
              ->where('id', $id)
              ->update(['role_id' => $request-$role]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
