@extends('layout.default')

@section('title', 'Task List')

@section('content')
    @foreach ($list as $item)
        <li>{{ $item->title }}</li>
    @endforeach
@endsection
