@extends('layouts.main')

@section('content')
<h1>List of coins</h1>
<p>
    <a href="{{ route('coins.create') }}">Create a coin</a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Short name</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coins as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->short_name }}</td>
            <td>{{ $item->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection