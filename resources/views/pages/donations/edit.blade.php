@extends('layouts.app')

@section('title', 'Edit Donation')

@section('content')
    <div
        class="container mx-auto max-w-5xl bg-white mt-4 border border-primary rounded-lg shadow-md overflow-y-auto h-[80vh]">
        <div class="py-2 px-4 sticky top-0 bg-white">
            <h1 class="text-2xl font-bold">Edit <span class="text-primary">Donation</span></h1>
        </div>

        {{-- Display Validation Errors --}}
        <div class="min-h-[50px]">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('donations.update', $donation) }}" method="POST" class="space-y-4 p-6 mb-6 rounded-lg">
            @csrf
            @method('PUT')

            {{-- Reusable input class --}}
            @php
                $inputClasses =
                    'w-full border border-gray-400 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary outline-none ring-gray-400';
            @endphp

            {{-- Donation Amount --}}
            <div>
                <label class="block font-semibold">Donation Amount</label>
                <input type="number" name="amount" value="{{ old('amount', $donation->amount) }}" required
                    class="{{ $inputClasses }}">
            </div>

            {{-- Donor Name --}}
            <div>
                <label class="block font-semibold">Donor Name</label>
                <input type="text" name="donor_name" value="{{ old('donor_name', $donation->donor_name) }}" required
                    class="{{ $inputClasses }}">
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $donation->email) }}" required
                    class="{{ $inputClasses }}">
            </div>

            {{-- Message --}}
            <div>
                <label class="block font-semibold">Message (Optional)</label>
                <textarea name="message" class="{{ $inputClasses }}">{{ old('message', $donation->message) }}</textarea>
            </div>

            {{-- Anonymous Donation Checkbox --}}
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="anonymous" id="anonymous" class="w-5 h-5 text-primary focus:ring-primary"
                    {{ old('anonymous', $donation->anonymous) ? 'checked' : '' }}>
                <label for="anonymous" class="text-gray-700">Donate anonymously</label>
            </div>

            <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                {{-- Update Donation Button --}}
                <button type="submit"
                    class="border-1 hover:border-primary bg-dark hover:bg-white hover:text-primary text-white font-bold py-2 px-4 rounded-lg transition hover:scale-105 hover:opacity-80 duration-300 ease-in-out">
                    Update Donation
                </button>

                {{-- Back Button --}}
                <a href="{{ route('donations.index') }}"
                    class="border-1 hover:border-primary bg-white hover:bg-white hover:text-primary text-dark font-bold py-2 px-4 rounded-lg transition hover:scale-105 hover:opacity-80 duration-300 ease-in-out">
                    Back
                </a>
            </div>
        </form>
    </div>
@endsection
