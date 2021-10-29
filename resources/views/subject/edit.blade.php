@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subject edit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('subject.update',[$subject])}}">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{$subject->subject}}">
                            <small class="form-text text-muted">Subject.</small>
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