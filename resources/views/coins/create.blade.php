@extends('layouts.main')

@section('content')
<h1>Create your coin here</h1>
<form action="{{ route('coins.store') }}" method="POST">
    @csrf
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