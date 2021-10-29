<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\studentSubject;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
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
        $schoolClases = SchoolClass::all();
        $students = Student::all();
        if ($request->filter && 'schoolClass' == $request->filter) {
            $students = Student::where('school_class_id', $request->school_class_id)->get();
        }
        return view('student.index', ['students' => $students, 'schoolClasses' => $schoolClases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        $schoolClases = SchoolClass::all();
        return view('student.create', ['schoolClasses' => $schoolClases, 'subject' => $subject]);
    }
    public function add(Student $student, Request $request)
    {
        $student->subjects()->attach($request->subject);
        return redirect()->route('student.show', ['student' => $student]);
    }
    public function remove(Student $student, Request $request)
    {
        $student->subjects()->detach($request->subject);
        return redirect()->route('student.show', ['student' => $student]);
    }
    public function mark(Student $student, Request $request)
    {
        $subject = Subject::all();
        $mark = Mark::all();
        return view('student.mark', ['student' => $student, 'mark' => $mark, 'subject' => $subject]);
    }
    public function markAdd(Student $student, Request $request)
    {
        $student->marks()->attach($request->mark);
        return redirect()->route('student.mark', ['student' => $student]);
    }
    public function markRemove(Student $student, Request $request)
    {
        $student->marks()->detach($request->mark);
        return redirect()->route('student.mark', ['student' => $student]);
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
                'name.required' => 'student name required',
                'surname.required' => 'student surname required',
                'name.max' => 'too long student name',
                'surname.max' => 'too long student surname',
                'name.min' => 'too short student name',
                'surname.min' => 'too short student surname'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $student = new Student;
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->school_class_id = $request->school_class_id;
        $student->save();

        return redirect()->route('student.index')->with('success_message', 'succefully recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

        $subjects = Subject::all();
        $id = $student->id;
        $subjects = Subject::with('students')->whereDoesntHave('students', function ($query) use ($id) {
            $query->where('student_id', $id);
        })->get();
        return view('student.show', ['student' => $student,  'subjects' => $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $schoolClases = SchoolClass::all();
        return view('student.edit', ['student' => $student, 'schoolClasses' => $schoolClases]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'min:3', 'max:64'],
                'surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'name.required' => 'student name required',
                'surname.required' => 'student surname required',
                'name.max' => 'too long student name',
                'surname.max' => 'too long student surname',
                'name.min' => 'too short student name',
                'surname.min' => 'too short student surname'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->school_class_id = $request->school_class_id;
        $student->save();
        return redirect()->route('student.index')->with('success_message', 'succesfully changed.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success_message', 'Succesfully deleted.');;
    }
}
