<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => [ 'required', 'min:3', 'max:100', "regex:/^[\pL\s,']+$/u" ],

            'description' => [ 'required', 'min:10', 'max:500', "regex:/^[\pL\s,']+$/u" ],

            'due_date' => 'required|date'

        ], [

            'title.required' => 'El títol es obligatori.',
            'title.min' => 'El títol ha de tenir almenys 3 caracters.',
            'title.max' => 'El títol no pot superar els 100 caracters.',
            'title.regex' =>'Només lletres, sisplau',

            'description.required' => 'La descripció es obligatoria.',
            'description.min' => 'La descripció ha de tenir almenys 10 caracters.',
            'description.regex' =>'Només lletres, sisplau',
            'description.max' => 'La descripció no pot superar els 500 caracters.',

            'due_date.required' => 'La data és obligatòria.',
            'due_date.date' => 'La data no és vàlida.'

        ]);

        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'completed'=>$request->has('completed'),
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));    
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => ['required', 'min:3', 'max:100', "regex:/^[\pL\s,']+$/u"],

            'description' => ['required', 'min:10', 'max:500', "regex:/^[\pL\s,']+$/u"],

            'due_date' => 'required|date'

        ], [

            'title.required' => 'El títol es obligatori.',
            'title.min' => 'El títol ha de tenir almenys 3 caracters.',
            'title.max' => 'El títol no pot superar els 100 caracters.',
            'title.regex' => 'Només lletres, sisplau',

            'description.required' => 'La descripció es obligatoria.',
            'description.min' => 'La descripció ha de tenir almenys 10 caracters.',
            'description.regex' => 'Només lletres, sisplau',
            'description.max' => 'La descripció no pot superar els 500 caracters.',

            'due_date.required' => 'La data és obligatòria.',
            'due_date.date' => 'La data no és vàlida.'
        ]);

        $task = Task::find($request->id);

        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'completed'=>$request->has('completed'),
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Request $request)
    {
        Task::destroy($request->id);

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }    
    
    public function date($fecha)
    {
        $tasks = Task::whereDate('due_date', $fecha)
                        ->where('completed', false)
                        ->get();

        return response()->json($tasks);    
    }
    
    public function dates()
    {
        $dates = Task::whereNotNull('due_date')
                        ->where('completed', false)
                        ->pluck('due_date');

        return response()->json($dates);    
    }
}