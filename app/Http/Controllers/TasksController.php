<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Google\Client;
use Google\Service\Tasks;

class TasksController extends Controller
{
    /**
     * Fetch Google Tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        /** @var Client $client */
        $client = new Client();
        $client->setAccessToken($user['token']);

        /** @var Tasks $service */
        $service = new Tasks($client);
        $tasksLists = $service->tasklists->listTasklists()->getItems();

        $tasks = [];
        foreach ($tasksLists as $list) {
            $tasks = array_merge($tasks, $service->tasks->listTasks($list->getId())->getItems() ?? []);
        }

        return view('todos', compact('tasks'));
    }
}
