@extends('layouts.main')

@section('content')
<a href="{{ route('auth.logout') }}">Logout</a>
<h1>List of users</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            @if (Auth::user()->role == 'super')
            <th>Options</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->role }}</td>
            <td>{{ $item->email }}</td>
            @if (Auth::user()->role == 'super')
            <td>
                <form action="/app/users/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection