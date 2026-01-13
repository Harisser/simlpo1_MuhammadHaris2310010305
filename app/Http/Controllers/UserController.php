<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apotek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('apotek')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $apotek = Apotek::all();
        return view('user.create', compact('apotek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // default aman
            'role' => $request->role,
            'id_apotek' => $request->id_apotek,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('user.index')
            ->with('berhasil', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $apotek = Apotek::all();
        return view('user.edit', compact('user', 'apotek'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'id_apotek' => $request->id_apotek,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('user.index')
            ->with('berhasil', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('berhasil', 'User berhasil dihapus');
    }
}

