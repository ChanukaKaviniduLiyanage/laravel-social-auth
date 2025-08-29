<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Google\Client;
use Google\Service\Gmail;

class EmailController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        $client = new Client();
        $client->setAccessToken($user['token']);

        $service = new Gmail($client);

        // Fetch list of messages
        $allMessages = $service->users_messages->listUsersMessages('me', ['maxResults' => 10])->getMessages();

        $messages = [];

        if ($allMessages) {
            foreach ($allMessages as $msg) {
                $message = $service->users_messages->get('me', $msg->id);
                $headers = collect($message->getPayload()->getHeaders());

                $messages[] = [
                    'id' => $msg->id,
                    'subject' => $headers->firstWhere('name', 'Subject')?->value ?? 'No Subject',
                    'from' => $headers->firstWhere('name', 'From')?->value ?? 'Unknown',
                    'date' => $headers->firstWhere('name', 'Date')?->value ?? '',
                    'snippet' => $message->getSnippet(),
                ];
            }
        }

        return view('email', ['messages' => $messages]);
    }
}
