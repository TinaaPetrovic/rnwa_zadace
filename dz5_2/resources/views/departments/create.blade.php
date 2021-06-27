@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/departments" method="post">
            @csrf
            <div class="row">
                <label for="name">Naziv</label>
                <input type="text" class="form-control" name="Name">
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
