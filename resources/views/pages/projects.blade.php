@extends('layouts.main-layout')
@section('head')
<title>Home</title>
@endsection
@section('content')
<h1>
    tipi di progetto
</h1>

<div>
    <ul>
        @foreach($projects as $project)
        <li class="my-3">
            <div>
                {{$project->nome}}
            </div>
            <!-- qua non si fa un ciclo essendo che i progetti faranno riferimento ad un solo type quindi non ritornerà un array  -->
            {{$project->type->risorse_usate}}
        </li>
        @endforeach
    </ul>
</div>
@endsection