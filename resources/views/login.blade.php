<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with Google</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-purple-900 min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-lg w-full max-w-sm text-center p-10">
        
        <h1 class="text-4xl font-bold mb-4 text-white" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Welcome
        </h1>
        <p class="text-gray-300 mb-8">Sign in with Google to access your dashboard.</p>

        <a href="{{ route('google.login') }}" 
           class="flex items-center justify-center gap-3 w-full bg-white/10 border border-white/20 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 hover:bg-white/20">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google logo">
            <span>Login with Google</span>
        </a>

        @if($errors->any())
            <p class="text-red-400 mt-6 text-sm">{{ $errors->first() }}</p>
        @endif
    </div>

</body>
</html>