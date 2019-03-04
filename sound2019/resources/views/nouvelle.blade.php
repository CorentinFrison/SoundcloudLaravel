@extends('layouts.app')

@section('content')

<form action="/creer" method="post" enctype="multipart/form-data">
    <input type="text" name="nom" required placeholder="Le nom de la musique" />
    <br />
    <input type="text" name="style" placeholder="Le style de la musique" required />
    <br />
    <input type="file" name="chanson" required />
    <br />
    {{csrf_field()}}
    <input type="submit" />
    <br />

@endsection