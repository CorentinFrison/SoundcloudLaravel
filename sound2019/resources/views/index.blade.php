@extends('layouts.app')

@section('content')
    <div id="main_page">
   @foreach($chansons as $c)
  <div class="main_chanson">
       <a class="chanson" data-file="{{$c->fichier}}" href="#">{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}" data-pjax>{{$c->utilisateur->name}}</a><br>
  </div>
   @endforeach
    </div>
@endsection

