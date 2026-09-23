<?php

namespace App\Http\Controllers;

use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $reminders = Task::whereDate('due_date', today())
                            ->where('completed', false)
                            ->get();

        return view('home', compact('reminders'));
    }
}