@extends('layout.default')

@section('title', 'Register')

@section('content')
    @if ($errors->any())
        <x-alert>
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your name?" value="{{ old('name') }}"><br>
        <input type="email" name="email" placeholder="Email?" value="{{ old('email') }}"><br>
        <input type="password" name="password" placeholder="Password?"><br>
        <input type="password" name="password_confirmation" placeholder="Confirm your pass!"><br>

        <input type="submit" value="Create new user!">
    </form>
@endsection
