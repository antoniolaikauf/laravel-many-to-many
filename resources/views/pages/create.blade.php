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
            <!-- form per crearer un nuovo progetto -->
            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('POST')
                <!-- valore che da il nuovo progetto -->
                <label for="nome_progetto">metti nome progetto</label>
                <input class="form-control my-3" type="text" placeholder="Default input" aria-label="default input example" name="nome_progetto">
                <!-- valore che da il giorno che hai iniziato il  progetto -->
                <label for="inizio_progetto ">data inizio progetto</label>
                <input type="date" class="form-control my-3" name="inizio_progetto" id="inizio_progetto">

                <label for="img"> inserisci l'immagine</label>
                <input type="file" class="form-control my-3" name="img" id="img">

                <!-- valore che da la descrizione del progetto -->
                <label for="descrizione">metti descrizione del progetto</label>
                <textarea class="form-control my-3" id="exampleFormControlTextarea1" rows="3" name="descrizione"></textarea>

                <!-- valore che da la possibilità di selezioneare il progetto nuovo progetto -->
                <h2>selezione il tipo di progetto</h2>
                <select class="form-select my-3" aria-label="Default select example" name="nome" id="nome">
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->nome}}</option>
                    @endforeach
                </select>
                <h2>selezione il tipo di tecnologia </h2>
                <!-- valore che da la possibilitàdi selezionare la tecnologia  -->
                @foreach ($technologies as $technology)
                <div class="form-check">
                    <input class="form-check-input float-none" type="checkbox" value="{{ $technology -> id }}" id="technology_id[]" name="technology_id[]">
                    <label class="form-check-label">
                        {{$technology->nome_tecnologia}}
                    </label>
                </div>
                @endforeach
                <input type="submit" value="crea progetto" class="my-3">
            </form>
        </div>
    </div>
</div>
@endsection