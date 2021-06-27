@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/professors" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$professor->ProfessorId}}">
            <div class="row">
                <label for="Name">Ime</label>
                <input type="text" class="form-control" name="name" value="{{$professor->Name}}">
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="DepartmentId">Odjeljenje</label>
                </div>
                <div class="col-75">
                    <select id="DepartmentId" name="DepartmentId">
                        <option value="-1" selected disabled>Odaberite odjeljenje</option>
                        @foreach($departments as $department)
                            <option value="{{$department->DepartamentId}}" {{$department->DepartamentId == $professor->Departaments_DepartamentId ? 'selected' : ''}}>{{$department->Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-25">
                    <label for="titles[]">Titule</label>
                </div>
                <div class="col-75">
                    <select multiple id="titles[]" name="titles[]">
                        <option selected disabled>Odaberite titule</option>
                        @foreach($titles as $title)
                            <option value="{{$title->TitleId}}" {{in_array($title->DepartamentId,array_map(function ($title){return $title->TitleId;}, $professor->titles)) ? 'selected' : ''}}>{{$title->Type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
