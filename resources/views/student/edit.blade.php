@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mokinio redagavimas</div>
                <div class="card-body">
                    <form method="POST" action="{{route('student.update',[$student])}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$student->name}}">
                            <small class="form-text text-muted">Name.</small>
                        </diV>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control" value="{{$student->surname}}">
                            <small class=" form-text text-muted">Surname.</small>
                        </diV>
                        <select name="school_class_id">
                            @foreach ($schoolClasses as $schoolClass)
                            <option value="{{$schoolClass->id}}" @if($schoolClass->id == $student->school_class_id) selected @endif>
                                {{$schoolClass->grade}} {{$schoolClass->letter}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-info" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection