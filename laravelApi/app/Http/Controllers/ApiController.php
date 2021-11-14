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

    }
    public function readTodo() {

    }
    public function updateTodo() {

    }
    public function deleteTodo() {

    }
}
