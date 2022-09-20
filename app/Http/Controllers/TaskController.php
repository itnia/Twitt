<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index () {
        $id = auth()->user()->id;
        $data = Task::where('user_id', $id)->get();
        return $data;
    }

    public function store (Request $request) {
        Task::create([
            'task' => $request->task,
            'notice' => false,
            'user_id' => auth()->user()->id
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
