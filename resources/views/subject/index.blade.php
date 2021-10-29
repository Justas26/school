@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subject list
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Subject</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($subjects as $subject)
                            <tr>
                                <td>{{$subject->subject}}</td>
                                <td><a class="btn btn-primary" href="{{route('subject.edit',[$subject])}}">edit</a></td>
                                <td>
                                    <form method="POST" action="{{route('subject.destroy', $subject)}}">
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