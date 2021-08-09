@extends('layout')
@section('title','Edit book '.$book->title)
@section('content')
    <form method="POST" action="{{route('books.update',$book)}}">
        @csrf
        @method( 'PUT')
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
                   placeholder="{{$book->title}}"
                   aria-label="title">
        </div>
        <div class="row">
            <input name="publication_year" type="text" class="form-control"
                   placeholder="{{$book->publication_year}}"
                   aria-label="publication_year">
        </div>
        @foreach($book->authors as $author)
            <div class="row">
                <div class="col">
                    <input name="firstname" type="text" class="form-control"
                           placeholder="{{$author->firstname}}"
                           aria-label="firstname" disabled>
                </div>
                <div class="col">
                    <input name="lastname" type="text" class="form-control"
                           placeholder="{{$author->lastname}}"
                           aria-label="lastname" disabled>
                </div>
                <div class="col">
                    <input name="patronymic" type="text" class="form-control"
                           placeholder="{{$author->patronymic}}"
                           aria-label="patronymic" disabled>
                </div>
            </div>
        @endforeach
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Choose new author(s)
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
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </div>
    </form>
@endsection
