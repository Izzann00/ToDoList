<?php

namespace App\Repositories;

use App\Models\Task;


class TaskRepository
{
    public function getData()
    {
        return Task::all();
    }

    public function get(int $id)
    {
        return Task::find($id);
    }

    public function store(array $data)
    {
        return Task::create([

            'title' => $data['title'],

            'description' => $data['description'] ?? null,

        ]);
    }

    public function update(int $id, array $data)
    {
        $task = Task::find($id);

        if (!$task) {

            return null;

        }

        $task->update([

            'title' => $data['title'],

            'description' => $data['description'] ?? null,

        ]);

        return $task;
    }

    public function delete(int $id)
    {
        return Task::destroy($id);
    }
}