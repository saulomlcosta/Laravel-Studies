@extends('layout.default')

@section('title', 'Edit Tasks')

@section('content')
    <h1>Edit</h1>

    <form method="POST">
        @csrf

        @if ($errors->any())
            <x-alert>
                @foreach ($errors->all() as $error )
                    {{ $error }}<br/>
                @endforeach
            </x-alert>
        @endif

        <label>
            Title:<br/>
            <input type="text" name="title" value="{{ $data->title }}">
        </label>

        <input type="submit" value="Save"><br>
        <a href="/tasks">Return to list</a>
    </form>
@endsection
