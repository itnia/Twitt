<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index () {
        $data = Task::all();
        return $data;
    }

    public function store (Request $request) {
        Task::create([
            'task' => $request->task,
            'notice' => false
        ]);
    }

    public function update (Task $task) {
        $task->notice = !$task->notice;
        $task->save();
    }

    public function destroy ($id) {
        Task::destroy($id);
    }
}
