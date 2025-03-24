<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailCandidat;
use Illuminate\Support\Facades\Auth;
class CandidatController extends Controller
{
    public function showLoginForm()
    {
        return view('candidats.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'candidat') {
                return redirect()->intended('/candidat/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Vous n\'êtes pas autorisé à accéder à cette section.']);
            }
        }

        return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
    }
    public function index()
    {
        $candidats = Candidat::all();
        return view('dge.dashboard', compact('candidats'));
    }
    public function idi()
    {
        $candidats = Candidat::all();

        return view('public.listeCandidats', compact('candidats'));
    }

    public function create()
    {
        return view('candidats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse_email' => 'required|email|unique:candidats,adresse_email',
            'numero_telephone' => 'required|numeric|unique:candidats,numero_telephone',
            'parti_politique' => 'nullable|string',
            'slogan' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur1' => 'required|string',
            'couleur2' => 'required|string',
            'couleur3' => 'required|string',
            'url_info' => 'nullable|string',
        ]);
        $password= Str::random(12);

        $user = User::create([
            'name' => $request->nom . ' ' . $request->prenom,
            'email' => $request->adresse_email,
            'password' => Hash::make($password),
            'role' => 'candidat'
        ]);

        // Gérer l'upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Créer le candidat
        $candidat=Candidat::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse_email' => $request->adresse_email,
            'numero_telephone' => $request->numero_telephone,
            'parti_politique' => $request->parti_politique,
            'slogan' => $request->slogan,
            'photo' => $photoPath,
            'trois_couleurs_parti' => json_encode([$request->couleur1, $request->couleur2, $request->couleur3]),
            'url_page_infos' => $request->url_info,
            'user_id' => $user->id,
            'numero_carte_electeur' => Str::uuid()
        ]);
        Mail::to($candidat->adresse_email)->send(new MailCandidat($candidat, $password));

        return redirect()->route('dashboard.dge')->with('success', 'Candidat créé avec succès.');
    }

    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', compact('candidat'));
    }

    public function update(Request $request, Candidat $candidat)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse_email' => 'required|email|unique:candidats,adresse_email,' . $candidat->id,
            'numero_telephone' => 'required|numeric|unique:candidats,numero_telephone,' . $candidat->id,
            'parti_politique' => 'nullable|string',
            'slogan' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur1' => 'required|string',
            'couleur2' => 'required|string',
            'couleur3' => 'required|string',
            'url_info' => 'nullable|string',
        ]);

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $candidat->photo = $photoPath;
        }

        // Mettre à jour le candidat
        $candidat->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse_email' => $request->adresse_email,
            'numero_telephone' => $request->numero_telephone,
            'parti_politique' => $request->parti_politique,
            'slogan' => $request->slogan,
            'trois_couleurs_parti' => json_encode([$request->couleur1, $request->couleur2, $request->couleur3]),
            'url_page_infos' => $request->url_info,
        ]);

        return redirect()->route('dashboard.dge')->with('success', 'Candidat mis à jour avec succès.');
    }

    public function destroy(Candidat $candidat)
    {
        $candidat->delete();

        return redirect()->route('dashboard.dge')->with('success', 'Candidat supprimé avec succès.');
    }
}
