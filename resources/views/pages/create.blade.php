@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')
<h1>
    tipi di progetto
</h1>
<!-- form per crearer un nuovo progetto -->
<form action="{{route('pages.store')}}" method="POST">

    @csrf
    @method('POST')
    <!-- valore che da il nuovo progetto -->
    <label for="nome_progetto">metti nome progetto</label>
    <input type="text" id="nome_progetto" name="nome_progetto">
    <br>
    <!-- valore che da il giorno che hai iniziato il  progetto -->
    <label for="inizio_progetto">data inizio progetto</label>
    <input type="date" name="inizio_progetto" id="inizio_progetto">
    <br>
    <!-- valore che da la descrizione del progetto -->
    <label for="descrizione">metti descrizione del progetto</label>
    <input type="text" id="descrizione" name="descrizione">
    <br>
    <!-- valore che da la possibilità di selezioneare il progetto nuovo progetto -->
    <h2>selezione il tipo di progetto</h2>
    <select name="nome" id="nome">
        @foreach($types as $type)
        <option value="{{$type->id}}">{{$type->nome}}</option>
        @endforeach
    </select>
    <h2>selezione il tipo di tecnologia </h2>
    <!-- valore che da la possibilitàdi selezionare la tecnologia  -->
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