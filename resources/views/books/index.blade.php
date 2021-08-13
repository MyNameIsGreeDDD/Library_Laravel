@extends('layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <a type="button" class="btn btn-primary" href="{{route('books.create')}}">Create book</a>
        </tr>
        <tr>
            <a type="button" class="btn btn-dark" href="{{route('authors.index')}}">Go to authors</a>
        </tr>
        <tr>
            <form method="POST" action="{{route('books.filter')}}">
                @csrf
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Find books by author
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach($authors as $author)
                            <div class="form-check">
                                <input name="authorId" type="radio" id="flexRadioDefault2" value="{{$author->id}}"
                                       onMouseDown="this.isChecked=this.checked;"
                                       onClick="this.checked=!this.isChecked;">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    {{$author->firstname.' '.$author->lastname.' '.$author->patronymic}}
                                </label>
                            </div>
                        @endforeach
                        <div class="col">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </div>
                    </ul>
                </div>
                </div>
            </form>
            <form method="POST" action="{{route('books.filter')}}">
                @csrf
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Find books by publication year
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <div class="input-group-text">
                            <input name="publication_year" type="text" class="form-control"
                                   aria-label="Text input with radio button">
                            <div class="col">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </div>
                    </ul>
            </form>
        </tr>
        </thead>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Publication year</th>
            <th scope="col">Authors</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>
                    <a href="{{route('books.show', $book->id)}}">{{$book->title}}</a>
                </td>
                <td>{{$book->publication_year }}</td>
                <td>
                    @foreach($book->authors as $author)
                        {{$author->firstname}}
                        {{$author->lastname}}
                        {{$author->patronymic}}
                    @endforeach
                </td>
                <td>
                    <form method="POST" action="{{route('books.destroy',$book)}}">
                        <a type="button" class="btn btn-warning"
                           href="{{route('books.edit', $book->id)}}">Edit</a>
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
