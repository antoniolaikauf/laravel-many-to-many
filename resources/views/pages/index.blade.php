@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                <a href="{{route('pages.create')}}">crea un nuovo progetto</a>
            </h1>
        </div>
        @foreach($types as $type)
        <div class="col-6 text-start border">
            <div>
                <strong> tipo di progetto:</strong> {{$type->nome}}
            </div>
            <div>
                <strong>gruppo di progetti n:</strong>{{$type->id}}
            </div>
            <div>
                <strong> risorse usate per questoprogetto :</strong>{{$type->risorse_usate}}
            </div>

            @if($type->in_gruppo)
            <span>
                <mark> progetto fatto in gruppo</mark>
            </span>
            @endif
            @if(!$type->in_gruppo)
            <span>
                <mark>progetti fatto singolarmente</mark>
            </span>
            @endif
            <ul>
                <!-- qua si fa un altro ciclo essendo che ci saranno diversi progetti per ogni type 
            e la tabella sarà dentro type  -->
                @foreach($type-> projects as $project)
                <li>
                    <a href="{{route('pages.show',$project->id)}}">
                        <h3>nome progetto: {{$project->nome_progetto}}</h3>
                        <div>
                            <strong> data inizio del progetto:</strong> {{$project->inizio_progetto}}
                        </div>
                        <div>
                            <strong>descrizione del progetto: </strong>{{$project->descrizione}}
                        </div>
                        <a href="{{route('pages.edit', $project->id )}}">edit progetto</a>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection