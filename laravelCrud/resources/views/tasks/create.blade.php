@extends('layout.default')

@section('title', 'Add Tasks')

@section('content')
    <h1>Add</h1>

    <form method="POST">
        @csrf

        @if (session('warning'))
            <div style="font-weight: bold; text-align:center; border:3px solid #FF0000; padding: 5px; width:25%">
                {{ session('warning') }}
            </div>
        @endif

        <label>
            Give me a task!<br/>
            <input type="text" name="title">
        </label>

        <input type="submit" value="add">
    </form>
@endsection
