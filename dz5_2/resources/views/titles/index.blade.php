@extends('layouts.app')

@section('content')

    <div class="row">
        <a class="btn btn-block btn-primary" href="/titles/create">New</a>
    </div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Tip</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($titles as $title)
            <tr>
                <td>{{$row->TitleId}} </td>
                <td> {{$row->Type}}</td>
                <td><a href="/posts/{{$row->TitleId}}/edit" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="/posts/{{$row->TitleId}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
