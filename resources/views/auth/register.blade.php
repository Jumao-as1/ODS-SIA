@extends('layouts.app')

@section('content')
    <div class="w-screen h-screen flex justify-center items-center bg-gradient-to-br from-green-200 to-blue-300">
        <form action="{{ route('register') }}" method="POST"
            class="w-full max-w-sm bg-white/30 backdrop-blur-lg shadow-2xl p-8 rounded-2xl border border-white/50 space-y-6">
            @csrf

            <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Create an Account 🎉</h2>

            <!-- Success/Error Messages -->
            <div class="pt-4">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded-md mb-4">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <!-- Name Input -->
            <div class="relative">
                <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required
                    class="peer bg-transparent py-3 w-full rounded-lg text-gray-900 placeholder-transparent ring-2 px-4 ring-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">
                <label for="name"
                    class="absolute cursor-text left-4 -top-3 text-sm text-gray-700 bg-white px-1 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-base peer-focus:-top-3 peer-focus:text-blue-500 peer-focus:text-sm">
                    Full Name
                </label>
            </div>

            <!-- Email Input -->
            <div class="relative">
                <input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required
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

            <!-- Confirm Password Input -->
            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required
                    class="peer bg-transparent py-3 w-full rounded-lg text-gray-900 placeholder-transparent ring-2 px-4 ring-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">
                <label for="password_confirmation"
                    class="absolute cursor-text left-4 -top-3 text-sm text-gray-700 bg-white px-1 transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-base peer-focus:-top-3 peer-focus:text-blue-500 peer-focus:text-sm">
                    Confirm Password
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-green-500 hover:from-green-500 hover:to-blue-500 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md">
                Register
            </button>

            <!-- Login Link -->
            <div class="text-center">
                <span class="text-gray-600">Already have an account?</span>
                <a href="{{ route('login') }}" class="text-blue-500 font-medium hover:underline">Log In</a>
            </div>
        </form>
    </div>
@endsection
