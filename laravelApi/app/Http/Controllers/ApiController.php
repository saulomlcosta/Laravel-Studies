<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Todo;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function createTodo(Request $request) {
        $array = ['error' => ''];

        $rules = [
            'title' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $array['error'] = $validator->errors();

            return $array;
        }

        $title = $request->input('title');

        $todo = new Todo();
        $todo->title = $title;
        $todo->save();

        return $array;
    }
    public function readAllTodo() {
        $array = ['error' => ''];

        $array['list'] = Todo::all();

        return $array;
    }
    public function readTodo($id) {
        $array = ['error' => ''];

        $todo = Todo::find($id);

        if($todo) {
            $array['task'] = $todo;
        } else {
            $array['error'] = 'The task '.$id. ' does not exists!';
        }

        return $array;
    }

    public function updateTodo(Request $request, $id) {
        $array = ['error' => ''];

        $rules = [
            'title' => 'min:3',
            'done'  => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $array['error'] = $validator->errors();
            return $array;
        }

        $title = $request->input('title');
        $done = $request->input('done');

        $todo = Todo::find($id);
        if($todo) {
            if($title) {
                $todo->title = $title;
            }
            if($done !== NULL) {
                $todo->done = $done;
            }

            $todo->save();
        } else {
            $array['error'] = 'The task '.$id. ' does not exists!';
        }


        return $array;

    }
    public function deleteTodo($id) {
        $array = ['error' => ''];

        $array['taskDel'] = Todo::find($id)->delete();

        return $array;
    }
}
