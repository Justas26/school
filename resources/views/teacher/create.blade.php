@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher create</div>
                <div class="card-body">
                    <form method="POST" action="{{route('teacher.store')}}">
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
                        <select name="subject_id">
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->subject}}</option>
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