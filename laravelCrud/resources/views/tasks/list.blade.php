@extends('layout.default')

@section('title', 'Task List')

@section('content')
    <h1>Tasks List</h1>

    <h3>Hello, {{ $name }}! It's nice to see you again ;) </h3>

    <a href="/logout">Logout</a><br>

    @if ($editForm)
        <a href="tasks/create"> + Add new task</a>
    @endif

    @if(count($list) > 0)
        <ul>
            @foreach ($list as $item)
                <li>
                    <a href="tasks/done/{{ $item->id }}">[
                        @if ($item->solved == 1)
                            undone
                        @else
                            done
                        @endif]
                    </a>
                    {{ $item->title }}
                    @if ($editForm)
                        <a href="tasks/edit/{{ $item->id }}">[ edit ]</a>
                        <a href="tasks/delete/{{ $item->id }}"
                        onclick="return confirm('Are you sure about this?')">
                            [ delete ]
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>

    @else
        You don't have any task to do!
    @endif

@endsection
