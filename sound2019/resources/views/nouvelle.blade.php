@extends('layouts.app')

@section('content')

@include('_errors')

<form action="/creer" method="post" enctype="multipart/form-data" data-pjax>
    <input type="text" name="nom" required placeholder="Le nom de la musique" value="{{old('nom')}}"/>
    <br />
    <input type="text" name="style" placeholder="Le style de la musique" required value="{{old('style')}}"/>
    <br />
    <input type="file" name="chanson" required />
    <br />
    <input type="file" name="img" required />
    <br />
    {{csrf_field()}}
    <input type="submit" />
    <br />

@endsection