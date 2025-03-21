@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 mb pb-20">
        <div class="relative w-full">
            {{-- Session Message --}}
            <div id="success-message-container" class="absolute top-4 right-4 z-0">
                @if (session('success') || session('info'))
                    <div id="message"
                        class="p-3 rounded-md shadow-lg border-l-4
                      {{ session('success') ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ session('success') ?? session('info') }}
                    </div>

                    <script>
                        setTimeout(() => {
                            let messageDiv = document.getElementById('message');
                            if (messageDiv) {
                                messageDiv.style.display = 'none';
                            }
                        }, 4000);
                    </script>
                @endif
            </div>

            <div class="flex flex-col w-full space-y-4">
                <h1 class="text-4xl font-bold">Donations</h1>

                <a href="{{ route('donations.create') }}"
                    class="w-fit bg-dark hover:bg-gray-100 hover:text-primary border-2 hover:border-primary text-white font-bold py-2 px-4 rounded-lg mb-4 inline-block hover:scale-105 hover:opacity-80 duration-300 ease-in-out">
                    Add Donation
                </a>
            </div>
        </div>

        <div class="relative overflow-y-auto max-h-[500px] border border-primary rounded-lg shadow-md pb-[50px]">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-white sticky top-0 z-20 shadow-md">
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 text-left w-10">ID</th>
                        <th class="py-2 px-4 border border-gray-300 text-left">Donor Name</th>
                        <th class="py-2 px-4 border border-gray-300 text-left">Email</th>
                        <th class="py-2 px-4 border border-gray-300 text-left w-32">Amount</th>
                        <th class="py-2 px-4 border border-gray-300 text-left">Message</th>
                        <th class="py-2 px-4 border border-gray-300 text-left w-40">Anonymous</th>
                        <th class="py-2 px-4 border border-gray-300 text-center w-40">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border border-gray-300">{{ $donation->id }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                {{ $donation->anonymous ? 'Anonymous' : $donation->donor_name }}
                            </td>
                            <td class="py-2 px-4 border border-gray-300">{{ $donation->email }}</td>
                            <td class="py-2 px-4 border border-gray-300 text-center">${{ number_format($donation->amount, 2) }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $donation->message ?? 'N/A' }}</td>
                            <td class="py-2 px-4 border border-gray-300 text-center">
                                {{ $donation->anonymous ? 'Yes' : 'No' }}
                            </td>
                            <td class="py-2 px-4 border border-gray-300 text-center">
                                @if (auth()->check() && auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manager'))
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('donations.edit', $donation) }}"
                                            class="bg-dark hover:bg-gray-100 hover:text-primary border-1 hover:border-primary text-white font-bold py-1 px-3 rounded transition cursor-pointer hover:scale-110 hover:opacity-80 duration-300 ease-in-out">
                                            Edit
                                        </a>
                                        <form action="{{ route('donations.destroy', $donation) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-primary hover:bg-gray-100 hover:text-primary border-1 hover:border-primary text-white font-bold py-1 px-3 rounded transition cursor-pointer hover:scale-105 hover:opacity-80 duration-400 ease-in-out">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
