<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Validator;

class SchoolClassController extends Controller
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
    public function index()
    {
        $schoolClasses = SchoolClass::all();
        return view('schoolClass.index', ['schoolClasses' => $schoolClasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolClass.create');
    }
    public function add(SchoolClass $schoolClass, Request $request)
    {
        $schoolClass->teachers()->attach($request->teacher);
        return redirect()->route('schoolClass.show', ['schoolClass' => $schoolClass]);
    }
    public function remove(SchoolClass $schoolClass, Request $request)
    {
        $schoolClass->teachers()->detach($request->teacher);
        return redirect()->route('schoolClass.show', ['schoolClass' => $schoolClass]);
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
                'grade' => ['required', 'digits_between:0,9'],
                'grade' => ['required', 'numeric', 'between:1,12'],
                'letter' => ['required', 'min:1', 'max:2'],
            ],
            [
                'grade.required' => 'class grade required',
                'letter.required' => 'class letter required',
                'letter.max' => 'too long class letter',
                'letter.min' => 'too short class letter',
                'grade.digits_between' => 'incorrect grade format',
                'grade.numeric_between:1,12' => 'too large grade in the shcoolclass ',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $schoolClass = new SchoolClass;
        $schoolClass->grade = $request->grade;
        $schoolClass->letter = $request->letter;
        $schoolClass->save();
        return redirect()->route('schoolClass.index')->with('success_message', 'succesfully recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        $id = $schoolClass->id;
        $teachers = Teacher::with('classes')->whereDoesntHave('classes', function ($query) use ($id) {
            $query->where('school_class_id', $id);
        })->get();
        return view('schoolClass.show', ['schoolClass' => $schoolClass, 'teachers' => $teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass)
    {
        return view('schoolClass.edit', ['schoolClass' => $schoolClass]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'grade' => ['required', 'digits_between:0,9'],
                'grade' => ['required', 'numeric', 'between:1,12'],
                'letter' => ['required', 'min:1', 'max:2'],
            ],
            [
                'grade.required' => 'class grade required',
                'letter.required' => 'class letter required',
                'letter.max' => 'too long class letter',
                'letter.min' => 'too short class letter',
                'grade.digits_between' => 'incorrect grade format',
                'grade.numeric_between:1,12' => 'too large grade in the shcoolclass ',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $schoolClass->grade = $request->grade;
        $schoolClass->letter = $request->letter;
        $schoolClass->save();
        return redirect()->route('schoolClass.index')->with('success_message', 'succesfully changed.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        if ($schoolClass->students->count()) {
            return 'Cannot delete because it has students';
        }
        $schoolClass->delete();
        return redirect()->route('schoolClass.index')->with('successs_message', 'succesfully deleted.');
    }
}
