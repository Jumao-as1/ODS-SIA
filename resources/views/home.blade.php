@extends('layouts.app')

@section('content')
    <div class="w-screen h-screen flex flex-col justify-center items-center text-center bg-gradient-to-br from-blue-100 to-green-200">
        <h1 class="text-5xl font-extrabold text-gray-800 leading-tight animate-fadeIn">
            Welcome to the <span class="text-primary">Online Donation System</span> 🎉
        </h1>
        <p class="text-xl text-gray-700 mt-4 animate-fadeIn delay-200">
            We ensure your donations are safe with our trusted & secure payment processing.
        </p>
        <p class="text-2xl mt-2">🌍 💖 📢</p>

        <!-- Call-to-Action Button -->
        <a href="{{ route('donations.index') }}"
            class="mt-6 bg-primary text-white px-6 py-3 text-lg font-semibold rounded-full shadow-lg hover:bg-blue-600 transition duration-300 animate-fadeIn delay-400">
            Donate Now 💙
        </a>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
@endsection
