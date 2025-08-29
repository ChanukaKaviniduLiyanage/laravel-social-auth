<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-purple-900 min-h-screen p-6 font-sans">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-5xl font-bold mb-2 text-white" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Dashboard</h1>
        <p class="text-xl text-gray-300 mb-12">Welcome, {{ session('user')['name'] }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-8">
            <a href="{{ route('calendar') }}" class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-6 flex flex-col items-center justify-center text-center text-white hover:bg-white/20 transition-all duration-300 group">
                <svg class="w-16 h-16 mb-4 text-white/80 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0h18M-7.5 12h22.5" />
                </svg>
                <span class="text-lg font-semibold">Calendar</span>
            </a>

            <a href="{{ route('email') }}" class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-6 flex flex-col items-center justify-center text-center text-white hover:bg-white/20 transition-all duration-300 group">
                <svg class="w-16 h-16 mb-4 text-white/80 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <span class="text-lg font-semibold">Email</span>
            </a>

            <a href="{{ route('todos') }}" class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg p-6 flex flex-col items-center justify-center text-center text-white hover:bg-white/20 transition-all duration-300 group">
                <svg class="w-16 h-16 mb-4 text-white/80 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-lg font-semibold">ToDos</span>
            </a>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="bg-red-500/10 backdrop-blur-lg border border-red-500/20 text-red-300 rounded-2xl shadow-lg flex items-center justify-center gap-3 p-4 w-full h-16 hover:bg-red-500/20 hover:border-red-500/40 hover:text-red-200 transition-all duration-300 group">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M19.5 12l-4.5-4.5m0 0l4.5 4.5m-4.5-4.5v9" />
                </svg>
                <span class="font-semibold text-lg">Logout</span>
            </a>
        </div>
    </div>

</body>
</html>