@extends('layout.default')

@section('title', 'Edit Tasks')

@section('content')
    <h1>Edit</h1>

    <form method="POST">
        @csrf

        @if (session('warning'))
            <div style="font-weight: bold; text-align:center; border:3px solid #FF0000; padding: 5px; width:25%">
                {{ session('warning') }}
            </div>
        @endif

        <label>
            Title:<br/>
            <input type="text" name="title" value="{{ $data->title }}">
        </label>

        <input type="submit" value="Save"><br>
        <a href="/tasks">Return to list</a>
    </form>
@endsection
