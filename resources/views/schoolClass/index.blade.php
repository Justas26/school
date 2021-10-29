@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Class list</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Grade</th>
                            <th>Letter</th>
                            <th>Look</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        @foreach ($schoolClasses as $schoolClass)
                        <tr>
                            <td>{{$schoolClass->grade}}</td>
                            <td>{{$schoolClass->letter}}</td>
                            <td><a class="btn btn-success" href="{{route('schoolClass.show',[$schoolClass])}}">užeiti</a></td>
                            <td><a class="btn btn-primary" href="{{route('schoolClass.edit',[$schoolClass])}}">edit</a></td>
                            <td>
                                <form method="POST" action="{{route('schoolClass.destroy', $schoolClass)}}">
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