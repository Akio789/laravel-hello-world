@extends('layouts.main')

@section('content')
<h1>Detalle de {{ $coin->name }}</h1>
<p>Id: {{ $coin->id }}</p>
<p>Short name: {{ $coin->short_name }}</p>
<p>Name: {{ $coin->name }}</p>
<a href="/coins">Go Back</a>
@endsection