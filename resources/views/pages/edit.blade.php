@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- form per upgrade method in controller  -->
            <form action="{{route('pages.upgrade', $project->id)}}" method="POST">

                @csrf
                @method('PUT')
                <!-- valore che da il nuovo progetto -->
                <label for="nome_progetto">metti nome progetto</label>
                <input class="form-control my-3" type="text" placeholder="Default input" aria-label="default input example" name="nome_progetto" value="{{$project->nome_progetto}}">
                <!-- valore che da il giorno che hai iniziato il  progetto -->
                <label for="inizio_progetto my-3">data inizio progetto</label>
                <input type="date" name="inizio_progetto" id="inizio_progetto" value="{{$project->inizio_progetto}}">

                <!-- valore che da la descrizione del progetto -->
                <label for="descrizione">metti descrizione del progetto</label>
                <input class="form-control my-3" aria-label="default input example" placeholder="Default input" type="text" id="descrizione" name="descrizione" value="{{$project->descrizione}}">

                <h2>selezione il tipo di progetto</h2>
                <!-- stampare il type di progetto a cui appartiene il progetto selezionato, con condizione che fa vedere quello selezionato -->
                <select class="form-select my-3" aria-label="Default select example" name="nome" id="nome">
                    @foreach($types as $type)
                    <option value="{{$type->id}}" @if($project -> type -> id == $type -> id)
                        selected
                        @endif
                        >{{$type->nome}}</option>
                    @endforeach
                </select>
                <!-- stampare i tipi di technology  -->
                <h2>selezione il tipo di tecnologia </h2>
                @foreach ($technologies as $technology)
                <div class="form-check">
                    <input class="form-check-input float-none" type="checkbox" name="technology_id[]" id="technology_id[]" value="{{ $technology -> id }}" @foreach($project -> technologies as $technology_project)
                    @if ($technology_project -> id == $technology -> id)
                    checked
                    @endif
                    @endforeach

                    >
                    <label for="technology_id[]" class="form-check-label">
                        {{ $technology -> nome_tecnologia }}
                    </label>
                </div>
                @endforeach
                <br>
                <input type="submit" value="aggiorna progetto">
        </div>
    </div>
</div>
@endsection