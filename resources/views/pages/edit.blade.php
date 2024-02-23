@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')



<form action="{{route('pages.upgrade', $project->id)}}" method="POST">

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
    <h2>selezione il tipo di progetto</h2>
    <select name="nome" id="nome">
        @foreach($types as $type)
        <option value="{{$type->id}}" @if($project -> type -> id == $type -> id)
            selected
            @endif
            >{{$type->nome}}</option>
        @endforeach
    </select>
    <h2>selezione il tipo di tecnologia </h2>
    @foreach ($technologies as $technology)
    <input type="checkbox" name="technology_id[]" id="technology_id[]" value="{{ $technology -> id }}" 
    @foreach($project -> technologies as $technology_project)
       @if ($technology_project -> id == $technology -> id)
          checked
       @endif
    @endforeach

    >
    <label for="technology_id[]">
        {{ $technology -> nome_tecnologia }}
    </label>
    <br>
    @endforeach
    <br>
    <input type="submit" value="aggiorna progetto">

    @endsection