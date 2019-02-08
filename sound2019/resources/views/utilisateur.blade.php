@extends('layouts.app')

@section('content')
    <h3>Page de : {{$utilisateur->name}}</h3>

    il suit {{$utilisateur->jeLesSuit->count()}} personne(s)
<br/>
Suivi par {{$utilisateur->ilsMeSuivent->count()}} personne(s)
<br/>

    @auth
        @if(Auth::id() != $utilisateur->id)
            @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
                <a href="/suivre/{{$utilisateur->id}}">Arreter de suivre</a>
            @else
                <a href="/suivre/{{$utilisateur->id}}">Suivre</a>
            @endif
        @endif
@endauth

<br>


    @include("_chansons", ["chansons"=> $utilisateur->chansons])

@endsection