<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Exception;
use Illuminate\Support\Facades\Log;
class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('pages.donations.index', compact('donations'));
    }

    // Responsible for handling creation of donations
    public function create()
    {
        return view('pages.donations.create');
    }

    // Responsible for handling storing of donations

public function store(Request $request)
{

    $request->validate([
        'donor_name' => 'nullable|string|max:200',
        'email' => 'nullable|email|max:100',
        'amount' => 'required|numeric|min:1',
    ]);

    try {
        $donation = Donation::create([
            'donor_name' => $request->donor_name,
            'email' => $request->email,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'is_anonymous' => $request->is_anonymous === 'on' ? true : false,
        ]);
        return redirect()->route('donations.index')->with('success', "Donation with ID {$donation->id} was added successfully!");
    } catch (Exception $e) {
        Log::error('Donation Error: ' . $e->getMessage());


        return redirect()->route('donations.index')->with('error', 'Failed to add donation. Please try again.');
    }
}


    // Responsible for handling editing of donations
    public function edit(Donation $donation)
    {
        return view('pages.donations.edit', compact('donation'));
    }

    // Responsible for handling updates of donations
    public function update(Request $request, Donation $donation)
    {
        $validatedData = $request->validate([
            'donor_name' => 'nullable|string|max:200',
            'email' => 'nullable|email|max:100',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'is_anonymous' => 'boolean',
        ]);

        $donation->fill($validatedData);

        if ($donation->isDirty()) {
            $donation->save();
            return redirect()->route('donations.index')->with('success', "Donation with ID {$donation->id} was updated successfully.");
        }

        return redirect()->route('donations.index')->with('info', "No changes were made in ID {$donation->id}.");
    }

    // Responsible for destroying donations
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')->with('success', "Donation with ID {$donation->id} was deleted successfully!");
    }
}
