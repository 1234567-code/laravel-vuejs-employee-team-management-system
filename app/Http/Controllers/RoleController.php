<?php

namespace App\Http\Controllers;
use Exception;
use DB;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\team_member;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles =role::all();
        return $roles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'role_name' => null,
            'team_member' => [
                [
                    'teams_id' => null,
                    'employees_id' => null,
                    'roles_id' => null,
                ],
                ]
            ];
        return response()->json($data);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $role =role::create([
            'role_name' => $request->role_name
        ]); 
        if(sizeof($request->team_member) > 1)
        {
            foreach($request->team_member as $team_member)
            {
                $team_members = team_member::create([
                //'member_name' => $team_member['member_name'],
                //'member_email' => $team_member['member_email'],
                'teams_id' => $team_member['team_id'],
                'employees_id' => $team_member['employees_id'],  
                'roles_id' => $role->id 
            ]);
            }
                
        }
        DB::commit();
        return "transaction completed";
        }catch(Exception $ex)
        {
            return $ex->getMessage();
            DB::rolBack(); 
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
        //
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
        //
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
