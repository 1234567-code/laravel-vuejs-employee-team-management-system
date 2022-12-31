<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use DB;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\user_account;
use App\Models\team_member;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : JsonResponse
    {
        $employees = employee::with('user_account')->get();
        //return $employees;
        return response()->json($employees, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $data = [
        // 'employee_code' => null,
        // 'employee_name' => null,
        // 'user_accounts_id' => null
        // 'team-member' => [
        //     'employee_code' => null,
        //     'employee_name' => null,
        //     'user_accounts_id' => null
        // ]
        // ];
        // $employee = new employee;
        // $employee::create($data);
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
            $employee =employee::create([
            'employee_code' => $request->employee_code,
            'employee_name' => $request->employee_name,
            'user_accounts_id' => $request->user_accounts_id
        ]); 
        foreach(json_decode($request->team_member) as $member)
        {
                $team_members = team_member::create([
                'member_name' => $member->member_name,
                'member_email' => $member->member_email,
                'team_id' => $member->team_id,
                'employees_id' => $employee->id,  
                'role_id' => $member->role_id 
            ]);
        }
        DB::commit();
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
        $employee = employee::with('user_member')->findOrFail($id);
        return $employee;
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
        $employeeUpdate = employee::findOrFail($id);
        $employeeUpdate::update([
            'employee_code' => $request->employee_code,
            'employee_name' => $request->employee_name,
            'user_accounts_id' =>$request->user_accounts_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeRecord = employee::findOrFail($id);
        $employeeRecord::delete();
    }
}
