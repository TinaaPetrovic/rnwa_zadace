@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/titles/{{$title->TitleId}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="TitleId" value="{{$title->TitleId}}">
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <label for="Type">Tip</label>
                <input type="text" class="form-control" name="Type"  value="{{$title->Type}}">
            </div>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
