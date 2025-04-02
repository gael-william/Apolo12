<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Boutique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    public function index() {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        $boutiques = Boutique::all();
        return view('admin.user.create', compact('boutiques'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'cnib' => 'required|unique:users,cnib',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|unique:users,telephone',
            'password' => 'required|confirmed',
            'sexe' => 'required',
            'photo_profil' => 'nullable|image|max:2048',
            'role' => 'required|in:super_admin,admin',
            'boutique_id' => 'nullable|exists:boutiques,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo_profil')) {
            $photoPath = $request->file('photo_profil')->store('users', 'public');
        }

        User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'cnib' => 'B' . $request->cnib,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'photo_profil' => $photoPath,
            'role' => $request->role,
            'boutique_id' => $request->boutique_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté !');
    }

    public function edit(User $user) {
        $boutiques = Boutique::all();
        return view('admin.user.edit', compact('user', 'boutiques'));
    }
    
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'cnib' => 'required|unique:users,cnib,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'required|unique:users,telephone,' . $user->id,
            'password' => 'nullable|confirmed',
            'sexe' => 'required',
            'photo_profil' => 'nullable|image|max:2048',
            'role' => 'required|in:super_admin,admin',
            'boutique_id' => 'nullable|exists:boutiques,id',
        ]);
    
        $photoPath = $user->photo_profil;
        if ($request->hasFile('photo_profil')) {
            if ($user->photo_profil) {
                Storage::disk('public')->delete($user->photo_profil);
            }
            $photoPath = $request->file('photo_profil')->store('users', 'public');
        }
    
        $user->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'cnib' => 'B' . $request->cnib,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'sexe' => $request->sexe,
            'photo_profil' => $photoPath,
            'role' => $request->role,
            'boutique_id' => $request->boutique_id,
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour !');
    }

    public function destroy(User $user) {
        if ($user->photo_profil) {
            Storage::disk('public')->delete($user->photo_profil);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé !');
    }
}
