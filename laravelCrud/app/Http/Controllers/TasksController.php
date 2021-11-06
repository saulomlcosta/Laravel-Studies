<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function list() {
        $list = DB::select('SELECT * FROM tasks');

        return view('tasks.list', compact(
            'list',
        ));
    }

    public function create() {
        return view('tasks.create');

    }
    public function createAction(Request $request) {
        if($request->filled('title')) {
            $title = $request->input('title');

            DB::insert('INSERT INTO tasks (title) VALUES (:title)', [
                'title' => $title
            ]);

            return redirect('tasks');
        } else {
            return redirect('tasks/create')->with('warning', 'You need to give me a task first!');
        }
    }
    public function edit($id) {
        $data = DB::select('SELECT * FROM tasks WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            return view('tasks.edit', [
                'data' => $data[0]
            ]);
        } else {
            return redirect('tasks');
        }
    }
    public function editAction(Request $request, $id) {
        if($request->filled('title')) {
            $title = $request->input('title');

            $data = DB::select('SELECT * FROM tasks WHERE id = :id', [
                'id' => $id
            ]);

            if(count($data) > 0) {
                DB::update('UPDATE tasks SET title = :title WHERE id = :id', [
                'id' => $id,
                'title' => $title
            ]);

            return redirect('tasks');

            } else {
                return redirect('tasks');
            }
        }
    }

    public function delete() {

    }
    public function done() {

    }
}
