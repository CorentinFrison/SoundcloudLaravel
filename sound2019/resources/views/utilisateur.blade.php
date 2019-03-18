@extends('layouts.app')

@section('content')

    @guest
    <h3>{{$utilisateur->name}}</h3>
    <div class="follow">
        Follow {{$utilisateur->jeLesSuit->count()}} personne(s)<br/>
        Follower {{$utilisateur->ilsMeSuivent->count()}} personne(s)
    </div>
        @endguest

    @auth
        @if(Auth::id() != $utilisateur->id)
        <h3>{{$utilisateur->name}}</h3>
        <div class="follow">
        Follow {{$utilisateur->jeLesSuit->count()}} personne(s)<br/>
        Follower {{$utilisateur->ilsMeSuivent->count()}} personne(s)
        </div>
            <br/>
            @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
                <a href="/suivre/{{$utilisateur->id}}" data-pjax ><img class="img" src="{{asset('/public/img/icon_croix.png')}}" width="100px"/></a>
            @else
                <a href="/suivre/{{$utilisateur->id}}" data-pjax ><img class="img" src="{{asset('/public/img/icon_heart.png')}}" width="100px"/></a>
            @endif
        @else
        <h3>Mon profil</h3>
        <div class="follow">
        Follow {{$utilisateur->jeLesSuit->count()}} personne(s)<br/>
        Follower {{$utilisateur->ilsMeSuivent->count()}} personne(s)<br/>
        </div>
            @endif
    @endauth

<br>


    @include("_chansons", ["chansons"=> $utilisateur->chansons])

@endsection



