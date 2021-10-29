<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;
use Validator;

class MarkController extends Controller
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
        $mark = Mark::all();
        return view('mark.index', ['mark' => $mark]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        $student = Student::all();
        return view('mark.create', ['subject' => $subject, 'student' => $student]);
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
                'mark' => ['required', 'digits_between:0,9'],
                'mark' => ['required', 'numeric', 'between:1,10'],
            ],
            [
                'mark.required' => 'mark required',
                'mark.digits_between' => 'incorrect mark format',
                'mark.numeric_between:1,100' => 'too large mark in the mark table ',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $mark = new Mark();
        $mark->mark = $request->mark;
        $mark->student_id = $request->student_id;
        $mark->subject_id = $request->subject_id;
        $mark->save();

        return redirect()->route('mark.index')->with('success_message', 'succesfully recorded.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        $student = Student::all();
        $subject = Subject::all();
        return view('mark.edit', ['mark' => $mark, 'subject' => $subject, 'student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mark' => ['required', 'digits_between:0,9'],
                'mark' => ['required', 'numeric', 'between:1,10'],
            ],
            [
                'mark.required' => 'mark required',
                'mark.digits_between' => 'incorrect mark format',
                'mark.numeric_between:1,100' => 'too large mark in the mark table ',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $mark = new Mark();
        $mark->mark = $request->mark;
        $mark->student_id = $request->student_id;
        $mark->subject_id = $request->subject_id;
        $mark->save();

        return redirect()->route('mark.index')->with('success_message', 'succesfully changed.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('mark.index')->with('success_message', 'succesfully deleted.');;
    }
}
