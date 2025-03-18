<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailCandidat;

class AdminController extends Controller
{
    public function showCreateCandidatForm()
    {
        return view('candidats.create');
    }

    public function createCandidat(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|string|unique:candidats,numero_telephone',
            'parti_politique' => 'nullable|string',
            'slogan' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur1' => 'required|string',
            'couleur2' => 'required|string',
            'couleur3' => 'required|string',
            'url_info' => 'nullable|string',
        ]);

        // Générer un mot de passe temporaire
        $password = Str::random(12);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->nom . ' ' . $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'candidat'
        ]);

        // Gérer l'upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Créer le candidat
        $candidat = Candidat::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse_email' => $request->email,
            'numero_telephone' => $request->telephone,
            'parti_politique' => $request->parti_politique,
            'slogan' => $request->slogan,
            'photo' => $photoPath,
            'trois_couleurs_parti' => json_encode([$request->couleur1, $request->couleur2, $request->couleur3]),
            'url_page_infos' => $request->url_info,
            'user_id' => $user->id, // Associer l'utilisateur au candidat
            'numero_carte_electeur' => Str::uuid(), // Générer un UUID pour le numéro de carte d'électeur
        ]);

        // Envoyer l'email avec les informations de connexion
        Mail::to($candidat->adresse_email)->send(new MailCandidat($candidat, $password));

        return redirect()->route('dashboard.dge')->with('success', 'Candidat créé avec succès. Un email contenant ses informations de connexion lui a été envoyé.');
    }

    public function destroyCandidat($id)
    {
        $candidat = Candidat::findOrFail($id);
        $candidat->delete();

        return redirect()->route('dashboard.dge')->with('success', 'Candidat supprimé avec succès.');
    }
}