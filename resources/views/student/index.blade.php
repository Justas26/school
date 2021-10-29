@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student list
                    <form action="{{route('student.index')}}" method="get">
                    <fieldset>
                        <legend>Filter</legend>
                        <div class="block">
                            <div class="form-group">
                                <select name="school_class_id">
                                    @foreach ($schoolClasses  as $schoolClass)
                                    <option value="{{$schoolClass->id}}">{{$schoolClass->grade}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select grade from the list.</small>
                            </div>
                        </div>
                        <div class="block">
                            <button type="submit" class="btn btn-info" name="filter" value="schoolClass">Filter</button>
                            <a href="{{route('student.index')}}" class="btn btn-warning">Reset</a>
                        </div>
                    </fieldset>
                </form>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Look</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->surname}}</td>
                                <td><a class="btn btn-success" href="{{route('student.show',[$student])}}">užeiti</a></td>
                                <td><a class="btn btn-primary" href="{{route('student.edit',[$student])}}">edit</a></td>
                                <td>
                                    <form method="POST" action="{{route('student.destroy', $student)}}">
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