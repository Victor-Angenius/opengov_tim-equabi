<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $this->authorize('manage-admins');

        $admins = User::query()
            ->where('is_admin', true)
            ->latest()
            ->get();

        return view('admin.users.index', compact('admins'));
    }

    public function create()
    {
        $this->authorize('manage-admins');

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('manage-admins');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => true,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun admin baru berhasil dibuat.');
    }
}
