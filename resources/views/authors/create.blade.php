@extends('layout')
@section('title','add author')
@section('content')
    <form method="POST" action="{{route('authors.store')}}">
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
            <input name="firstname" type="text" class="form-control"
                   placeholder="firstname"
                   aria-label="firstname">
        </div>
        <div class="row">
            <input name="lastname" type="text" class="form-control"
                   placeholder="lastname"
                   aria-label="lastname">
        </div>
        <div class="row">
            <input name="patronymic" type="text" class="form-control"
                   placeholder="patronymic"
                   aria-label="patronymic">
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
@endsection
