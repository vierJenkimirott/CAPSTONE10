<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RewardsController extends Controller
{
    public function index()
    {
        // You can add logic here to fetch rewards data from the database
        return view('rewards');
    }

    public function create()
    {
        return view('rewards.add');
    }

    public function pending()
    {
        // Logic for pending rewards
        return view('rewards.pending');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'reward_type' => 'required|string',
            'points' => 'required|integer|min:1',
            'description' => 'required|string'
        ]);

        // Add logic to store the reward in the database
        // For now, just redirect with success message
        return redirect()->route('rewards')->with('success', 'Reward added successfully');
    }
}
