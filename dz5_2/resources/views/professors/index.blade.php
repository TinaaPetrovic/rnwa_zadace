@extends('layouts.app')

@section('content')
    <div class="row">
        <a class="btn btn-block btn-primary" href="/professors/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Odjeljenje</th>
            <th>Titule</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($professors as $row)
            <tr>
                <th scope="row">{{$row->ProfessorId}} </th>
                <td> {{$row->Name}}</td>
                <td> {{$row->department->Name}}</td>
                <td>
                    @foreach($row->titles as $title)
                    {{ $title->Type . ',' }}
                    @endforeach
                </td>
                <td><a href="/professors/{{$row->ProfessorId}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/professors/{{$row->ProfessorId}}" method="post">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
