@extends('layouts.app')

@section('content')
   @foreach($chansons as $c)
   <br>
       <a class="chanson" data-file="{{$c->fichier}}" href="#">{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}" data-pjax>{{$c->utilisateur->name}}</a><br>
        <img class="img" data-file="{{$c->img}}" src="{{$c->img}}"  width="200px" height="200px"/>
   @endforeach

@endsection

