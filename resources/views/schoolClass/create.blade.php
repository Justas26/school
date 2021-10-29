@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Class create</div>
                <div class="card-body">
                    <form method="POST" action="{{route('schoolClass.store')}}">
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" name="grade" class="form-control">
                            <small class="form-text text-muted">Grade.</small>
                        </div>
                        <div class="form-group">
                            <label>Letter</label>
                            <input type="text" name="letter" class="form-control">
                            <small class="form-text text-muted">Letter.</small>
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