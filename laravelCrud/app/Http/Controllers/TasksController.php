<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function list() {
        return view('tasks.list');
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
