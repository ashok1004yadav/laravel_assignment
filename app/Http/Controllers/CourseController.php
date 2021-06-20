<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $module = 'Course';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module;
        $courses = Course::latest()->paginate(5);
        return view('courses.index',compact('courses','module_name'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_name = $this->module;
        return view('courses.create',compact('module_name'));
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
            'name' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success',$module_name.' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $module_name = $this->module;
        return view('courses.show',compact('course','module_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $module_name = $this->module;
        return view('courses.edit',compact('course','module_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $module_name = $this->module;
        $request->validate([
            'name' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success',$module_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $module_name = $this->module;
        $course->delete();
        return redirect()->route('courses.index')->with('success',$module_name.' deleted successfully');
    }
}
