<?php

namespace App\Http\Controllers;

use App\Models\UserVariable;
use Illuminate\Http\Request;

class UserVariableController extends Controller
{
    public $module = 'User Variable';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module;
        $userVariables = UserVariable::latest()->paginate(5);
        return view('user_variables.index',compact('userVariables','module_name'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_name = $this->module;
        return view('user_variables.create',compact('module_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_name = $this->module;
        $request->validate([
            'field_key' => 'required',
            'values' => 'required',
        ]);

        UserVariable::create($request->all());

        return redirect()->route('user_variables.index')->with('success',$module_name.' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserVariable  $userVariable
     * @return \Illuminate\Http\Response
     */
    public function show(UserVariable $userVariable)
    {
        $module_name = $this->module;
        return view('user_variables.show',compact('userVariable','module_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserVariable  $userVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVariable $userVariable)
    {
        $module_name = $this->module;
        return view('user_variables.edit',compact('userVariable','module_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserVariable  $userVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVariable $userVariable)
    {
        $module_name = $this->module;
        $request->validate([
            'field_key' => 'required',
            'values' => 'required',
        ]);

        $userVariable->update($request->all());

        return redirect()->route('user_variables.index')->with('success',$module_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserVariable  $userVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVariable $userVariable)
    {
        $module_name = $this->module;
        $userVariable->delete();
        return redirect()->route('user_variables.index')->with('success',$module_name.' deleted successfully');
    }
}
