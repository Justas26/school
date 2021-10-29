@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher list</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Subject</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->surname}}</td>
                            <td></td>
                            <td><a class="btn btn-primary" href="{{route('teacher.edit',[$teacher])}}">edit</a></td>
                            <td>
                                <form method="POST" action="{{route('teacher.destroy', $teacher)}}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">DELETE</button>
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
@endsection