@extends('layout.default')

@section('title', 'Login')

@section('content')
    @if (session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif

    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email?"><br>
        <input type="password" name="password" placeholder="Password?"><br>

        <input type="submit" value="Enter!">
    </form>
@endsection
