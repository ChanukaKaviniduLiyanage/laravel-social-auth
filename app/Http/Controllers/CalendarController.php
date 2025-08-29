<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Google\Client;
use Google\Service\Calendar;

class CalendarController extends Controller
{
    /**
     * Fetch Google Calendar events.
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

        /** @var Calendar $service */
        $service = new Calendar($client);

        // Fetch events with a max limit of 50
        $events = $service->events->listEvents('primary', [
            'maxResults' => 50,
            'orderBy' => 'startTime',
            'singleEvents' => true, // ensures recurring events are expanded
        ])->getItems();

        return view('calendar', compact('events'));
    }
}
