@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Class edit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('schoolClass.update',$schoolClass)}}">
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" name="grade" class="form-control" value="{{$schoolClass->grade}}">
                            <small class="form-text text-muted">Grade.</small>
                        </diV>
                        <div class="form-group">
                            <label>Letter</label>
                            <input type="text" name="letter" class="form-control" value="{{$schoolClass->letter}}">
                            <small class=" form-text text-muted">Letter.</small>
                        </diV>
                        @csrf
                        <button class="btn btn-info" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection