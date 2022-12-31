<?php

namespace App\Http\Controllers;
use Exception;
use DB;
use Illuminate\Http\Request;
use App\Models\team;
use App\Models\team_member;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams =team::all();
        return $teams;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'team_name' => null,
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
            $team =team::create([
            'team_name' => $request->team_name
        ]); 
        if(sizeof($request->team_member) > 0)
        {
            foreach($request->team_member as $team_member)
            {
                $team_members = team_member::create([
                'teams_id' => $team->id,
                'employees_id' => $team_member['employees_id'],  
                'roles_id' => $team_member['roles_id'] 
            ]);
            }
                
        }
        DB::commit();
        return "transaction completed";
        }catch(Exception $ex)
        {
            DB::rollBack(); 
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
