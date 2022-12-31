<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\team_member;
use App\Models\user_account;

use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $team_members =team_member::all();
            return $team_members;
        }catch(Exception $ex){
            return $ex->getMessage() ;
        }
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
        try {
            $team_member =team_member::create([
            'employees_id' => $request->employees_id,
            'teams_id' => $request->teams_id,
            'roles_id' => $request->roles_id
        ]);
        return "member created";

        }catch(Exception $ex)
        {
            return $ex->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $team_member = team_member::where('id', $id)->get();
            return "test";;
        }catch(Exception $ex){
            return "not found";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        try
        {
            $team_member = team_member::findOrFail($id);
            $res = $team_member::update([
                'employees_id' => $request->employees_id,
                'teams_id' => $request->teams_id,
                'roles_id' => $request->roles_id
            ]);
            return $res;
        }catch(Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
        $team_member = team_member::findOrFail($id);
        $res = $team_member::delete();
        return $res;
    }catch(Exception $ex)
    {
        return $ex->getMessage();
    }
        
        
    }
}

