<?php

namespace App\Http\Controllers;

use App\Models\SystemVariable;
use Illuminate\Http\Request;

class SystemVariableController extends Controller
{
    public $module = 'System Variable';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module;
        $systemVariables = SystemVariable::latest()->paginate(5);
        return view('system_variables.index',compact('systemVariables','module_name'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_name = $this->module;
        return view('system_variables.create',compact('module_name'));
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

        SystemVariable::create($request->all());

        return redirect()->route('system_variables.index')->with('success',$module_name.' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SystemVariable  $systemVariable
     * @return \Illuminate\Http\Response
     */
    public function show(SystemVariable $systemVariable)
    {
        $module_name = $this->module;
        return view('system_variables.show',compact('systemVariable','module_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SystemVariable  $systemVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemVariable $systemVariable)
    {
        $module_name = $this->module;
        return view('system_variables.edit',compact('systemVariable','module_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SystemVariable  $systemVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemVariable $systemVariable)
    {
        $module_name = $this->module;
        $request->validate([
            'field_key' => 'required',
            'values' => 'required',
        ]);

        $systemVariable->update($request->all());

        return redirect()->route('system_variables.index')->with('success',$module_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SystemVariable  $systemVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemVariable $systemVariable)
    {
        $module_name = $this->module;
        $systemVariable->delete();
        return redirect()->route('system_variables.index')->with('success',$module_name.' deleted successfully');
    }
}
