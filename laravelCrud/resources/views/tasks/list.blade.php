@extends('layout.default')

@section('title', 'Task List')

@section('content')
    <h1>Tasks List</h1>

    <a href="tasks/create"> + Add new task</a>

    @if(count($list) > 0)
        <ul>
            @foreach ($list as $item)
                <li>
                    <a href="tasks/done/{{ $item->id }}">[
                        @if ($item->solved === 1)
                            undone
                        @else
                            done
                        @endif]
                    </a>
                    {{ $item->title }}
                    <a href="tasks/edit/{{ $item->id }}">[ edit ]</a>
                    <a href="tasks/delete/{{ $item->id }}">[ delete ]</a>
                </li>
            @endforeach
        </ul>

    @else
        You don't have any task to do!
    @endif

@endsection
