@extends('layout')
@section('content')
    <a type="button" class="btn btn-primary" href="{{route('authors.create')}}">add author</a>
    <a type="button" class="btn btn-dark" href="{{route('books.index')}}">go to books</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Count books</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>
                    <a href="{{route('authors.show', $author->id)}}">{{$author->firstname}}</a>
                </td>
                <td>
                    {{$author->lastname}}
                </td>
                <td>
                    {{$author->patronymic}}
                </td>
                <td>
                    {{$author->books()->count()}}
                </td>
                <td>
                    <form method="POST" action="{{route('authors.destroy',$author)}}">
                        <a type="button" class="btn btn-warning"
                           href="{{route('authors.edit', $author->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
