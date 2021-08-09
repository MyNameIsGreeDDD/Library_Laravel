@extends('layout')
@section('title','Edit author '.$author->firstname)
@section('content')
    <form method="POST" action="{{route('authors.update',$author)}}">
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
            <div class="col">
                <input name="firstname" type="text" class="form-control"
                       placeholder="{{$author->firstname}}"
                       aria-label="firstname">
            </div>
            <div class="col">
                <input name="lastname" type="text" class="form-control"
                       placeholder="{{$author->lastname}}"
                       aria-label="lastname">
            </div>
            <div class="col">
                <input name="patronymic" type="text" class="form-control"
                       placeholder="{{$author->patronymic}}"
                       aria-label="patronymic">
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
