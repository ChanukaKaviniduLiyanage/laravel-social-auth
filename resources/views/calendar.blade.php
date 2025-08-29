<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-purple-900 min-h-screen p-6 font-sans">

    <div class="max-w-5xl mx-auto">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mb-8 bg-white/10 backdrop-blur-lg border border-white/20 text-white px-4 py-2 rounded-xl shadow-lg hover:bg-white/20 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Dashboard</span>
        </a>

        <h1 class="text-4xl font-bold mb-8 text-white" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Google Calendar Events
        </h1>

        <div class="space-y-4">
            @forelse($events as $event)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-6 hover:bg-white/20 transition-all duration-300">
                    <h2 class="text-xl font-semibold text-gray-100 mb-2">{{ $event->getSummary() }}</h2>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-sm text-gray-400">
                        <p><span class="font-medium text-gray-300">Start:</span> {{ \Carbon\Carbon::parse($event->start->dateTime ?? $event->start->date)->format('M d, Y \a\t h:i A') }}</p>
                        <p><span class="font-medium text-gray-300">End:</span> {{ \Carbon\Carbon::parse($event->end->dateTime ?? $event->end->date)->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            @empty
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 text-center p-10">
                    <p class="text-gray-300 text-lg">No upcoming events found.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>