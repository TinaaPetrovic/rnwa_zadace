@extends('layouts.app')

@section('content')
    <div class="row">
        <a class="btn btn-block btn-primary" href="/departments/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Naziv</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($departments as $row)
            <tr>
                <th scope="row">{{$row->DepartamentId}} </th>
                <td> {{$row->name}}</td>
                <td><a href="/departments/{{$row->DepartamentId}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/departments/{{$row->DepartamentId}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
