@extends('layout.default')

@section('title', 'Login')

@section('content')
    @if (session('warning'))
        <x-alert>
            {{ session('warning')}}<br>
            {{ $tries > 1 ? 'You have ' . $tries . ' more tries' : 'You have ' . $tries . ' more trie' }}
        </x-alert>
    @endif

    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email?"><br>
        <input type="password" name="password" placeholder="Password?"><br>

        @if ($tries <= 0)
            <h3>  You can't login anymore ! </h3>
        @else
            <input type="submit" value="Enter!">
        @endif


    </form>
@endsection
