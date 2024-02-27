@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')

<div>

    <h1>
        nome progeto:
        {{$project->nome_progetto}}
    </h1>
    <h3>
        tipo del progetto:
        {{$project ->type->nome}}
    </h3>
    <div>
        data inizioprogetto:
        {{$project->inizio_progetto}}
    </div>
    <div>
        descrizione progetto :
        {{$project->descrizione}}
    </div>
    <h3>
        tecnologie usate :
        @foreach($project->technologies as $p_technology)
        <div>
            {{$p_technology ->nome_tecnologia}}
        </div>
        @endforeach
    </h3>
</div>
@endsection