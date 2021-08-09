@extends('layout')
@section('title','Create book')
@section('content')
    <form method="POST" action="{{route('books.store')}}">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <input name="title" type="text" class="form-control"
                   placeholder="book"
                   aria-label="book">
        </div>
        <div class="row">
            <input name="publication_year" type="number" class="form-control"
                   placeholder="publication_year"
                   aria-label="publication_year">
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Authors
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($authors as $author)
                    <div class="form-check">
                        <input name="authorsId[]" class="form-check-input" type="checkbox"
                               value="{{$author->id}}"
                               id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$author->firstname.' '.$author->lastname.' '.$author->patronymic}}
                        </label>
                    </div>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">add</button>
            </div>
        </div>
    </form>
@endsection
