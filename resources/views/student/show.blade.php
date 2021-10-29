@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{$student->name}} {{$student->surname}}</h3>
                </div>
                <div class="card">
                    <div class="card-header"><b>Pamokų sąrašas</b></div>
                    <form action="{{route('student.add',[$student])}}" method="post">
                        @csrf
                        <select name="subject" id="">
                            @foreach ($subjects as $subjects)

                            <option value="{{$subjects->id}}">{{$subjects->subject}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">add</button>
                    </form>
                </div>
                <div class="card-header"><b>Student subject list and marks </b></div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Subject</th>
                            <th>Average</th>
                            <th>Marks</th>
                            <th>Remove</th>
                        </tr>
                        @foreach ($student->subjects as $subject)
                        <tr>
                            <td>{{$subject->subject}}</td>
                            <td></td>
                            <td><a class="btn btn-info" href="{{route('student.mark',[$student])}}">Pažymiai</a></td>
                            <td>
                                <form method="POST" action="{{route('student.remove', $student)}}">
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