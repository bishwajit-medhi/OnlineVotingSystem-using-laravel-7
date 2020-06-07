@extends('layouts.auth')

@section('content')
<div class="container">
    <div id="students">
        <table class="table table-hover">
            <tr>
                <th class="text-center" colspan="5">STUDENT LIST</th>
            </tr>
            <tr class="text-center">
                <td>Name</td>
                <td>Gender</td>
                <td>Department</td>
                <td>Registration Number</td>
                <td>Status</td>
            </tr>
                @foreach ($students as $student)
            <tr class="text-center">
                <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                <td>{{ $student->gender}}</td>
                <td>{{ $student->deptname }}</td>
                <td>{{ $student->regno }}</td>
                <td>{{ $student->status }}</td>
            </tr>            
            @endforeach
       </table>
    </div>
</div>


@endsection
