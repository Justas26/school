@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student create</div>
                <div class="card-body">
                    <form method="POST" action="{{route('student.store')}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                            <small class="form-text text-muted">Name.</small>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control">
                            <small class="form-text text-muted">Surname.</small>
                        </div>
                        <select name="school_class_id">
                            @foreach ($schoolClasses as $schoolClass)
                            <option value="{{$schoolClass->id}}">{{$schoolClass->grade}} {{$schoolClass->letter}}</option>
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