@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/departments/{{$department->DepartamentId}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="DepartmentId" value="{{$department->DepartamentId}}">
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <label for="name">Naziv</label>
                <input type="text" class="form-control" name="Name"  value="{{$department->Name}}">
            </div>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
