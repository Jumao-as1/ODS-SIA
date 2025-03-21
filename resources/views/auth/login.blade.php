@extends('layouts.app')

@section('content')
    <div class="w-screen h-screen flex justify-center items-center bg-gradient-to-br from-green-200 to-blue-300">
        <form action="{{ route('login') }}" method="POST"
            class="bg-white/30 backdrop-blur-md shadow-2xl p-8 rounded-2xl w-full max-w-sm border border-white/50 space-y-6">
            @csrf
            <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Welcome Back 👋</h2>

            <!-- Error / Success Messages -->
            <div class="h-[30px] flex items-center justify-center">
                @if (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded-md w-full text-center">
                        {{ session('error') }}
                    </div>
                @elseif (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 rounded-md w-full text-center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- Email Input -->
            <div class="relative">
                <input type="email" id="email" name="email" placeholder="Your Email" required
                    class="peer bg-transparent py-3 w-full rounded-lg text-gray-900 placeholder-transparent ring-2 px-4 ring-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">
                <label for="email"
                    class="absolute cursor-text left-4 -top-3 text-sm text-gray-700 bg-white px-1 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-base peer-focus:-top-3 peer-focus:text-blue-500 peer-focus:text-sm">
                    Email Address
                </label>
            </div>

            <!-- Password Input -->
            <div class="relative">
                <input type="password" id="password" name="password" placeholder="Your Password" required
                    class="peer bg-transparent py-3 w-full rounded-lg text-gray-900 placeholder-transparent ring-2 px-4 ring-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">
                <label for="password"
                    class="absolute cursor-text left-4 -top-3 text-sm text-gray-700 bg-white px-1 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-base peer-focus:-top-3 peer-focus:text-blue-500 peer-focus:text-sm">
                    Password
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-green-500 hover:from-green-500 hover:to-blue-500 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md">
                Log In
            </button>

            <!-- Register Link -->
            <div class="text-center">
                <span class="text-gray-600">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-blue-500 font-medium hover:underline">Register</a>
            </div>
        </form>
    </div>
@endsection
