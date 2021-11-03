<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function list() {
        $list = DB::table('tasks')
                     ->get();

        return view('tasks.list', compact(
            'list',
        ));
    }

    public function create() {
        return view('tasks.create');

    }
    public function createAction() {

    }
    public function edit() {
        return view('tasks.edit');
    }
    public function editAction() {

    }
    public function delete() {

    }
    public function done() {

    }
}
