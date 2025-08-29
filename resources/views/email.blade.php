<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gmail Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-purple-900 min-h-screen p-6 font-sans">

    <div class="max-w-4xl mx-auto">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mb-8 bg-white/10 backdrop-blur-lg border border-white/20 text-white px-4 py-2 rounded-xl shadow-lg hover:bg-white/20 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Dashboard</span>
        </a>

        <h1 class="text-4xl font-bold mb-8 text-white" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Gmail Inbox
        </h1>

        <div class="space-y-4">
            @forelse($messages as $message)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-6 hover:bg-white/20 transition-all duration-300 flex flex-col space-y-2">
                    <div class="flex justify-between items-baseline">
                        <h2 class="text-xl font-semibold text-gray-100">{{ $message['subject'] ?? 'No Subject' }}</h2>
                        <p class="text-xs text-gray-400 flex-shrink-0 ml-4">{{ \Carbon\Carbon::parse($message['date'])->format('M d, Y') }}</p>
                    </div>

                    <p class="text-sm font-medium text-gray-300">{{ $message['from'] }}</p>

                    <p class="text-sm text-gray-400 pt-1">
                        {{ $message['snippet'] ?? '' }}
                    </p>
                </div>
            @empty
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 text-center p-10">
                    <p class="text-gray-300 text-lg">Your inbox is empty.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>