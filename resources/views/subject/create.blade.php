@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subject create</div>
                <div class="card-body">
                    <form method="POST" action="{{route('subject.store')}}">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control">
                            <small class="form-text text-muted">Subeject.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection