@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Add mark </b></div>
                <div class="card-body">
                    <form method="POST" action="{{route('student.markadd',[$student])}}">
                        <div class="form-group">
                            <label>Mark</label>
                            <input type="text" name="mark" class="form-control" value="">
                            <small class="form-text text-muted">Mark.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-header"><b>Studento pažymiai </b></div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>Pažymiai</th>
            <th>Remove</th>
        </tr>
        @foreach ($subject-> marks($student_id) as $mark)
        <tr>
            <td></td>
            <td></td>
            <td>
                <form method="POST" action="{{route('student.markremove', $student)}}">
                    @csrf
                    <button class="btn btn-danger" type="submit" name="subject" value="{{$subjects->id}}">remove</button>
                </form>
            </td>
            <br>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection