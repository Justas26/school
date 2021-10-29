@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher edit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('teacher.update',$teacher)}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$teacher->name}}">
                            <small class="form-text text-muted">Name.</small>
                        </diV>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control" value="{{$teacher->surname}}">
                            <small class=" form-text text-muted">Surname.</small>
                        </diV>
                        <select name="subject_id">
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->subject}}</option>
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