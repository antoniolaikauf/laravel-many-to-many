@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')
<h1>
    tipi di progetto
</h1>
<form action="{{route('pages.store')}}" method="POST">

    @csrf
    @method('POST')

    <label for="nome_progetto">metti nome progetto</label>
    <input type="text" id="nome_progetto" name="nome_progetto">
    <br>
    <label for="inizio_progetto">data inizio progetto</label>
    <input type="date" name="inizio_progetto" id="inizio_progetto">
    <br>
    <label for="descrizione">metti descrizione del progetto</label>
    <input type="text" id="descrizione" name="descrizione">
    <br>
    <h2>selezione il tipo di progetto</h2>
    <select name="nome" id="nome">
        @foreach($types as $type)
        <option value="{{$type->id}}">{{$type->nome}}</option>
        @endforeach
    </select>
    <h2>selezione il tipo di tecnologia </h2>
    @foreach ($technologies as $technology)
    <input type="checkbox" name="technology_id[]" id="technology_id[]" value="{{ $technology -> id }}">
    <label for="technology_id[]">
        {{ $technology -> nome_tecnologia }}
    </label>
    <br>
    @endforeach
    <br>
    <input type="submit" value="crea progetto">
</form>
@endsection