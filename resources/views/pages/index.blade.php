@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')
<h1>
    tipi di progetto
</h1>

<div>
    <a href="{{route('pages.create')}}">crea un nuovo progetto</a>
    <ul>
        @foreach($types as $type)
        <li class="my-3">
            <div>
                tipo di progetto {{$type->nome}}
            </div>
            <div>
                gruppo di progetti n:{{$type->id}}
            </div>
            <div>
                risorse usate per questoprogetto :{{$type->risorse_usate}}
            </div>

            @if($type->in_gruppo)
            <span>
                progetto fatto in gruppo
            </span>
            @endif
            @if(!$type->in_gruppo)
            <span>
                progetti fatto singolarmente
            </span>
            @endif
            <ul>
                <!-- qua si fa un altro ciclo essendo che ci saranno diversi progetti per ogni type 
            e la tabella sarà dentro type  -->
                @foreach($type-> projects as $project)
                <li>
                    nome progetto: {{$project->nome_progetto}}
                    <div>
                        data inizio del progetto: {{$project->inizio_progetto}}
                    </div>
                    <div>
                        descrizione del progetto: {{$project->descrizione}}
                    </div>
                    <a href="{{route('pages.edit', $project->id )}}">edit progetto</a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</div>
@endsection