@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mark list
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Mark</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($mark as $mark )
                            <tr>
                                <td>{{$mark->mark}}</td>
                                <td><a class="btn btn-primary" href="{{route('mark.edit',[$mark])}}">edit</a></td>
                                <td>
                                    <form method="POST" action="{{route('mark.destroy', $mark)}}">
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