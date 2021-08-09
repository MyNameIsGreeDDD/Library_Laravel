@extends('layout')
@section('title','Author '.$author->firstname)
@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('authors.index') }}">Back</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Firstname: {{$author->firstname}}</li>
            <li class="list-group-item">Lastname: {{$author->lastname}}</li>
            <li class="list-group-item">Patronymic:{{$author->patronymic}}</li>
            <li class="list-group-item">Count books:{{$author->books()->count()}}</li>
        </ul>
    </div>
    <form method="POST" action="{{route('authors.destroy',$author)}}">
        <a type="button" class="btn btn-warning"
           href="{{route('authors.edit', $author->id)}}">Редактировать</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection
