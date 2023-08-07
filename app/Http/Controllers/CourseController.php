<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view ('courses.index', compact('courses'))->with('i',(request()->input('pages',1))*10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameCourse' => 'required',
            'timeDays' => 'required',
            'price' => 'required',
        ]);
        Course::create($request->all());
        return redirect()->route('courses.index')->with('success','Course created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'))->with('info','Get course succesfuly');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nameCourse' => 'required',
            'timeDays' => 'required',
            'price' => 'required',
        ]);
        $course = Course::find($id);
        $course->update($request->all());
    
        return redirect()->route('courses.index')->with('primary','Course uodated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('courses.index')->with('danger','Course deleted successfully');
    }
}
