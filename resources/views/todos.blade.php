<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-purple-900 min-h-screen p-6 font-sans">

    <div class="max-w-4xl mx-auto">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mb-8 bg-white/10 backdrop-blur-lg border border-white/20 text-white px-4 py-2 rounded-xl shadow-lg hover:bg-white/20 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Dashboard</span>
        </a>

        <h1 class="text-4xl font-bold mb-8 text-white" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Google Tasks
        </h1>

        <div class="space-y-4">
            @forelse($tasks as $task)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-5 flex justify-between items-center hover:bg-white/20 transition-all duration-300">
                    <p class="text-gray-200 text-lg">{{ $task->getTitle() }}</p>
                    
                    <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize
                        @if($task->getStatus() == 'completed')
                            bg-green-500/10 text-green-300 border border-green-500/20
                        @else
                            bg-yellow-500/10 text-yellow-300 border border-yellow-500/20
                        @endif
                    ">
                        {{ $task->getStatus() == 'needsAction' ? 'Pending' : $task->getStatus() }}
                    </span>
                </div>
            @empty
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 text-center p-10">
                    <p class="text-gray-300 text-lg">You have no tasks.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>