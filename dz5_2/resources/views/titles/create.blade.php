@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/titles" method="post">
            @csrf
            <div class="row">
                <label for="Type">Tip</label>
                <input type="text" class="form-control" name="Type">
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
