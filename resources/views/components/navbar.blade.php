<nav class="bg-green-200 flex justify-between items-center px-8 py-4 text-gray-900">
    <div>
        <a href="{{ url('/') }}" class="text-3xl text-gray-900 font-bold hover-underline">
            Online Donation System
        </a>
    </div>

    <div class="flex items-center space-x-6 text-lg font-bold">
        <a href="{{ url('/') }}" class="hover-underline">Home</a>
        <a href="{{ route('donations.index') }}" class="hover-underline">Donations</a>
        <a href="{{ route('donations.create') }}" class="hover-underline">Make a Donation</a>

        @auth

        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center space-x-2 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                <span class="text-gray-700">{{ Auth::user()->name ?? 'Guest' }}</span>
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-44 bg-white border border-gray-300 shadow-lg rounded-lg z-10">
                <ul class="py-2">
                    <li>
                        <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-primary hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        @else
            <a href="{{ route('register') }}" class="hover-underline">Register</a>
            <a href="{{ route('login') }}" class="hover-underline">Login</a>
        @endauth
    </div>
</nav>
