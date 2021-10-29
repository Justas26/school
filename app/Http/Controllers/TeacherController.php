<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Subject;
use Validator;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('teacher.index', ['teachers' => $teachers, 'subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        return view('teacher.create', ['subjects' => $subject]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'min:3', 'max:64'],
                'surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'name.required' => 'teacher name required',
                'surname.required' => 'teacher surnamae required',
                'name.min' => 'too short teacher name',
                'surname.min' => 'too short teacher surname',
                'name.max' => 'too long teacher name',
                'surname.max' => 'too long teacher surname'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->surname = $request->surname;
        $teacher->subject_id = $request->subject_id;
        $teacher->save();
        return redirect()->route('teacher.index')->with('success_message', 'succefully recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $subject = Subject::all();
        return view('teacher.edit', ['teacher' => $teacher,  'subjects' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'min:3', 'max:64'],
                'surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'name.required' => 'teacher name required',
                'surname.required' => 'teacher surnamae required',
                'name.min' => 'too short teacher name',
                'surname.min' => 'too short teacher surname',
                'name.max' => 'too long teacher name',
                'surname.max' => 'too long teacher surname'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->surname = $request->surname;
        $teacher->subject_id = $request->subject_id;
        $teacher->save();
        return redirect()->route('teacher.index')->with('success_message', 'succefully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success_message', 'succesfully deleted.');
    }
}
