@extends('layout.default')

@section('title', 'Add Tasks')

@section('content')
    <h1>Add</h1>

    <form method="POST">
        @csrf

        @if ($errors->any())
            <div style="font-weight: bold; text-align:center; border:3px solid #FF0000; padding: 5px; width:25%">
                @foreach ($errors->all() as $error )
                    {{ $error }}<br/>
                @endforeach
            </div>
        @endif

        <label>
            Give me a task!<br/>
            <input type="text" name="title">
        </label>

        <input type="submit" value="add"><br>
        <a href="/tasks">Return to list</a>
    </form>
@endsection
