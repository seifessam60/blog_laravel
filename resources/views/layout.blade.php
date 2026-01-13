<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Cairo', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-sm mb-8">
    <div class="max-w-4xl mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="text-2xl font-bold text-gray-800">
                📝 My Blog
            </a>
            
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('posts.create') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        + New Post
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center gap-2 text-gray-700 hover:text-gray-900 font-semibold">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="open"
                             @click.away="open = false"
                             x-transition
                             class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                            <a href="{{ route('profile.edit') }}" 
                               class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                ⚙️ Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    🚪 Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-gray-700 hover:text-gray-900 font-semibold">
                        Log In
                    </a>
                    <a href="{{ route('register') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        Sign Up
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>


    <!-- Content -->
    <main class="max-w-4xl mx-auto px-4 pb-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p>© 2026 Blog ❤️ - All rights reserved</p>
        </div>
    </footer>

</body>
</html>