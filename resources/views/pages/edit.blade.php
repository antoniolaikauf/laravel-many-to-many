@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')



<form action="" method="POST">

    @csrf
    @method('PUT')

    <label for="nome_progetto">metti nome progetto</label>
    <input type="text" id="nome_progetto" name="nome_progetto" value="{{$project->nome_progetto}}">
    <br>
    <label for="inizio_progetto">data inizio progetto</label>
    <input type="date" name="inizio_progetto" id="inizio_progetto" value="{{$project->inizio_progetto}}">
    <br>
    <label for="descrizione">metti descrizione del progetto</label>
    <input type="text" id="descrizione" name="descrizione" value="{{$project->descrizione}}">
    <br>
    <select name="nome" id="nome">
        @foreach($types as $type)
        <option value="{{$type->id}}" @if($project -> type -> id == $type -> id)
            selected
            @endif
            >{{$type->nome}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit" value="aggiorna progetto">

    @endsection