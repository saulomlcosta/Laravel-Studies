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
        $request->validate([
            'title' => [ 'required', 'string']
        ]);

        $title = $request->input('title');

        DB::insert('INSERT INTO tasks (title) VALUES (:title)', [
            'title' => $title
        ]);

            return redirect('tasks');
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
        $request->validate([
            'title' => [ 'required', 'string']
        ]);

        $title = $request->input('title');

        DB::update('UPDATE tasks SET title = :title WHERE id = :id', [
            'id' => $id,
            'title' => $title
            ]);

        return redirect('tasks');
    }

    public function delete($id) {
        DB::delete('DELETE FROM tasks WHERE id = :id', [
            'id' => $id
        ]);

        return redirect('tasks');
    }

    public function done($id) {
        DB::update('UPDATE tasks SET solved = 1 - solved WHERE id = :id',[
            'id' => $id
        ]);

        return redirect('tasks');
    }
}
