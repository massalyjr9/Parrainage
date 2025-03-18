<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile()
    {
        return view('candidat.profile');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $candidat = Auth::candidat();

        if ($request->file('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($candidat->photo) {
                Storage::delete('public/' . $candidat->photo);
            }

            // Enregistrer la nouvelle photo
            $path = $request->file('photo')->store('photos', 'public');
            $candidat->photo = $path;
            $candidat->save();
        }

        return redirect()->route('profile')->with('success', 'Photo de profil mise à jour avec succès.');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->telephone = $request->telephone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }
}
