<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.create_user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:20|unique:users|regex:/^[A-Za-z0-9]+$/',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['student', 'educator'])],
        ]);

        try {
            $user = User::create([
                'user_id' => $validated['user_id'],
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'middle_initial' => $validated['middle_initial'],
                'suffix' => $validated['suffix'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'status' => 'active',
                'role' => $validated['role'],
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create user. Please try again.');
        }
    }
}