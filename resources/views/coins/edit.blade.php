@extends('layouts.main')

@section('content')
<h1>Edit your coin here</h1>

<form action="/coins/{{ $id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="short-name">Short name</label>
        <input name="short_name" id="short-name" type="text">
    </div>
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>
@endsection