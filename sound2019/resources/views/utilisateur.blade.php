@extends('layouts.app')

@section('content')


    @auth
        @if(Auth::id() != $utilisateur->id)
        <h3>Page de : {{$utilisateur->name}}</h3>
        Il suit {{$utilisateur->jeLesSuit->count()}} personne(s)<br/>
        Suivi par {{$utilisateur->ilsMeSuivent->count()}} personne(s)<br/>
            @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
                <a href="/suivre/{{$utilisateur->id}}">Arreter de suivre</a>
            @else
                <a href="/suivre/{{$utilisateur->id}}">Suivre</a>
            @endif
        @else
        <h3>Ma page</h3>
        Je suis {{$utilisateur->jeLesSuit->count()}} personne(s)<br/>
        Je suis suivi par {{$utilisateur->ilsMeSuivent->count()}} personne(s)<br/>
        @endif
@endauth

<br>


    @include("_chansons", ["chansons"=> $utilisateur->chansons])

@endsection



