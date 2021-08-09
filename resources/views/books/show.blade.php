@extends('layout')
@section('title','Book '.$book->title)
@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('books.index') }}">Back</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Title: {{$book->title}}</li>
            <li class="list-group-item">Publication year: {{$book->publication_year}}</li>
            <li class="list-group-item">Authors:
                @foreach($book->authors as $author)
                    {{$author->firstname}}
                    {{$author->lastname}}
                    {{$author->patronymic}},
                @endforeach
            </li>
        </ul>
    </div>
    <form method="POST" action="{{route('books.destroy',$book)}}">
        <a type="button" class="btn btn-warning"
           href="{{route('books.edit', $book->id)}}">Редактировать</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection
