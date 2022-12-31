<?php

namespace App\Http\Controllers;
use Exception;
use DB;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\user_account;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =user_account::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'username' => null,
            'password' => null,
            'email' => null,
            'first_name' => null,
            'last_name' => null,
            'is_project_manager' => null,
            'employee' => [
                'employee_code' => null,
                'employee_name' => null,
                'user_accounts_id' => null,
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
            $user_account = user_account::create([
                'username' => $request->username,
                'password' => md5($request->password),
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'is_project_manager' => $request->is_project_manager
            ]);
            if(sizeof($request->employee) > 0)
            {
                foreach($request->employee as $employee)
                { 
                    $employee_name = $user_account->first_name." ".$user_account->last_name;
                    $employees = employee::create([
                    'employee_code' => $request->employee['employee_code'],
                    'employee_name' => $employee_name,
                    'user_accounts_id' => $user_account->id,
                    ]);
                }
                
            DB::commit();
            return "transaction completed";
            }
            DB::commit();
            return "user account made";
        }catch(Exception $ex)
        {
            return $ex->getMessage();
            DB::rollBack();
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
