<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list() {
        $list = Task::all();

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

        $newTask = new Task;

        $newTask->title = $title;

        $newTask->save();

        return redirect('tasks');
    }
    public function edit($id) {
        $data = Task::find($id);

        if($data) {
            return view('tasks.edit', [
                'data' => $data
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

        Task::find($id)->update(['title' => $title]);

        return redirect('tasks');
    }

    public function delete($id) {
        Task::find($id)->delete();

        return redirect('tasks');
    }

    public function done($id) {
        $taskStatus = Task::find($id);
        if($taskStatus) {
            $taskStatus->solved = 1 - $taskStatus->solved;
            $taskStatus->save();
        }

        return redirect('tasks');
    }
}
