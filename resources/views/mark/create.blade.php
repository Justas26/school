@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Writing a note from a specific subject</div>
                <div class="card-body">
                    <form method="POST" action="{{route('mark.store')}}">
                        <div class="form-group">
                            <label>Mark</label>
                            <input type="text" name="mark" class="form-control">
                            <small class="form-text text-muted">Mark.</small>
                        </div>
                        <select name="subject_id">
                            @foreach ($subject as $subject)
                            <option value="{{$subject->id}}">{{$subject->subject}}</option>
                            @endforeach
                        </select>
                        <select name="student_id">
                            @foreach ($student as $student)
                            <option value="{{$student->id}}">{{$student->name}} {{$student->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection