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
    public function edit() {
        return view('tasks.edit');
    }
    public function editAction() {

    }
    public function delete(Request $request) {

    }
    public function done() {

    }
}
