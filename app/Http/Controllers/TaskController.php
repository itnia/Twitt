<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store (Request $request) {
        Task::create([
            'task' => $request->task,
            'notice' => false
        ]);
    }

    public function update ($key) {
        return 'update'.$key;
    }

    public function destroy ($key) {
        return 'destroy'.$key;
    }
}
