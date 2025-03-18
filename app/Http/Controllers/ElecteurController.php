<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Electeur;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;

class ElecteurController extends Controller
{
    public function showInitialForm()
    {
        return view('electeur.initial');
    }

    public function showLoginForm()
    {
        return view('electeur.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'electeur') {
                return redirect()->intended('/electeurDashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Vous n\'êtes pas autorisé à accéder à cette section.']);
            }
        }

        return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
    }

    public function verifyInitialInfo(Request $request)
    {
        $request->validate([
            'numero_carte_electeur' => 'required|string|exists:temp_electeurs,numero_carte_electeur',
            'numero_carte_identite' => 'required|string|exists:temp_electeurs,numero_carte_identite',
            'nom' => 'required|string|exists:temp_electeurs,nom',
            'prenom' => 'required|string|exists:temp_electeurs,prenom',
            'numero_bureau_vote' => 'required|string|exists:temp_electeurs,numero_bureau_vote',
        ]);

        // Vérifier la cohérence des informations
        $electeur = DB::table('temp_electeurs')
            ->where('numero_carte_electeur', $request->numero_carte_electeur)
            ->where('numero_carte_identite', $request->numero_carte_identite)
            ->where('nom', $request->nom)
            ->where('prenom', $request->prenom)
            ->where('numero_bureau_vote', $request->numero_bureau_vote)
            ->first();

        if (!$electeur) {
            return back()->withErrors(['message' => 'Les informations fournies ne sont pas cohérentes.']);
        }

        // Stocker les informations dans la session
        $request->session()->put('electeur', $request->only(['numero_carte_electeur', 'numero_carte_identite', 'nom', 'prenom', 'numero_bureau_vote']));

        return redirect()->route('electeurs.complete.form');
    }

    public function showCompletionForm()
    {
        return view('electeur.complete');
    }

    public function completeRegistration(Request $request)
{
    $request->validate([
        'numero_telephone' => 'required|string',
        'adresse_email' => 'required|string|email',
        'password' => 'required|string|min:8|confirmed',
    ]);


    // Récupérer les informations de la session
    $electeurInfo = $request->session()->get('electeur');

    // Vérifier si l'électeur existe déjà
    $electeur = Electeur::where('numero_carte_electeur', $electeurInfo['numero_carte_electeur'])
        ->where('numero_carte_identite', $electeurInfo['numero_carte_identite'])
        ->where('nom', $electeurInfo['nom'])
        ->where('prenom', $electeurInfo['prenom'])
        ->where('numero_bureau_vote', $electeurInfo['numero_bureau_vote'])
        ->first();
        
         // Créer un nouvel utilisateur
        $user=User::create([
            'name' =>$electeurInfo['nom'] . $electeurInfo['prenom'],
            'email' => $request->adresse_email,
            'password' => Hash::make($request->password),
            'role' => 'electeur',
        ]);

    if ($electeur) {
        // Mettre à jour les informations de contact
        $electeur->update([
            'numero_telephone' => $request->numero_telephone,
            'adresse_email' => $request->adresse_email,
            'code_auth' => rand(100000, 999999),
        ]);
        
    } else {
        // Créer un nouvel électeur
        $electeur = Electeur::create([
            'numero_carte_electeur' => $electeurInfo['numero_carte_electeur'],
            'numero_carte_identite' => $electeurInfo['numero_carte_identite'],
            'nom' => $electeurInfo['nom'],
            'prenom' => $electeurInfo['prenom'],
            'numero_bureau_vote' => $electeurInfo['numero_bureau_vote'],
            'numero_telephone' => $request->numero_telephone,
            'adresse_email' => $request->adresse_email,
            'code_auth' => rand(100000, 999999),
            'user_id' => $user->id,
        ]);
    }

    // Envoyer le code d'authentification par email
    Mail::to($electeur->adresse_email)->send(new MessageGoogle($electeur, $electeur->code_auth));

    // Stocker les informations dans la session
    $request->session()->put('electeur_id', $electeur->id);
    $request->session()->put('password', $request->password);

    return redirect()->route('electeurs.validate.form');
}

    public function showValidationForm()
    {
        return view('electeur.validate');
    }

    public function validateCode(Request $request)
    {
        $request->validate([
            'code_auth' => 'required|string',
        ]);

        // Récupérer les informations de la session
        $electeurId = $request->session()->get('electeur_id');
        $password = $request->session()->get('password');

        // Vérifier le code d'authentification
        $electeur = Electeur::find($electeurId);
        if ($electeur->code_auth !== $request->code_auth) {
            return back()->withErrors(['message' => 'Le code d\'authentification est incorrect.']);
        }

        

        // Authentifier l'utilisateur
        Auth::loginUsingId($electeurId);

        return redirect()->route('login.electeur')->with('success', 'Inscription réussie.');
    }

    public function showImportForm()
    {
        return view('electeur.import');
    }

    public function register(Request $request)
    {
        $request->validate([
            'numero_carte_electeur' => 'required|string|exists:electeurs,numero_carte_electeur',
            'numero_carte_identite' => 'required|string|exists:electeurs,numero_carte_identite',
            'nom' => 'required|string|exists:electeurs,nom',
            'prenom' => 'required|string|exists:electeurs,prenom',
            'numero_bureau_vote' => 'required|string|exists:electeurs,numero_bureau_vote',
            'numero_telephone' => 'required|string|unique:electeurs,numero_telephone',
            'adresse_email' => 'required|string|email|unique:electeurs,adresse_email',
        ]);

        // Vérifier la cohérence des informations
        $electeur = Electeur::where('numero_carte_electeur', $request->numero_carte_electeur)
            ->where('numero_carte_identite', $request->numero_carte_identite)
            ->where('nom', $request->nom)
            ->where('prenom', $request->prenom)
            ->where('numero_bureau_vote', $request->numero_bureau_vote)
            ->first();

        if (!$electeur) {
            return back()->withErrors(['message' => 'Les informations fournies ne sont pas cohérentes.']);
        }

        // Mettre à jour les informations de contact
        $electeur->update([
            'numero_telephone' => $request->numero_telephone,
            'adresse_email' => $request->adresse_email,
        ]);

        // Générer un code d'authentification
        $code_auth = rand(100000, 999999);
        $electeur->update(['code_auth' => $code_auth]);

        // Envoyer le code d'authentification par SMS et email (à implémenter)

        return redirect()->route('electeurs.register.form')->with('success', 'Votre compte a été créé avec succès. Un code d\'authentification vous a été envoyé.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'checksum' => 'required|string',
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('uploads');

        // Lire le contenu du fichier
        $fileContent = Storage::get($filePath);

        // Calculer l'empreinte CHECKSUM
        $calculatedChecksum = hash('sha256', $fileContent);

        // Vérifier l'empreinte CHECKSUM
        if ($calculatedChecksum !== $request->checksum) {
            // Enregistrer la tentative d'upload échouée
            $tentativeUploadId = DB::table('tentatives_uploads')->insertGetId([
                'fichier_electeur_id' => DB::table('fichiers_electeurs')->insertGetId([
                    'nom_fichier' => $file->getClientOriginalName(),
                    'checksum' => $request->checksum,
                    'adresse_ip' => $request->ip(),
                    'utilisateur_upload' => Auth::id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]),
                'user_id' => Auth::id(),
                'adresse_ip' => $request->ip(),
                'checksum' => $request->checksum,
                'message_erreur' => 'L\'empreinte CHECKSUM ne correspond pas.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->withErrors(['checksum' => 'L\'empreinte CHECKSUM ne correspond pas.']);
        } else {
            // Enregistrer la tentative d'upload réussie
            $tentativeUploadId = DB::table('tentatives_uploads')->insertGetId([
                'fichier_electeur_id' => DB::table('fichiers_electeurs')->insertGetId([
                    'nom_fichier' => $file->getClientOriginalName(),
                    'checksum' => $request->checksum,
                    'adresse_ip' => $request->ip(),
                    'utilisateur_upload' => Auth::id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]),
                'user_id' => Auth::id(),
                'adresse_ip' => $request->ip(),
                'checksum' => $request->checksum,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Stocker les données dans une table temporaire
        $rows = array_map('str_getcsv', explode("\n", $fileContent));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (count($row) == count($header)) {
                $data = array_combine($header, $row);
                $data['tentative_upload_id'] = $tentativeUploadId;

                // Vérifier les doublons avant d'insérer
                $existingElecteur = DB::table('temp_electeurs')
                    ->where('numero_carte_electeur', $data['numero_carte_electeur'])
                    ->orWhere('numero_carte_identite', $data['numero_carte_identite'])
                    ->first();

                if ($existingElecteur) {
                    // Gérer les doublons (par exemple, ignorer ou mettre à jour)
                    continue; // Ignorer les doublons
                }

                DB::table('temp_electeurs')->insert($data);
            }
        }

        // Contrôler le fichier et les électeurs
        $this->controlerFichierElecteurs($filePath, $request->checksum);
        $this->controlerElecteurs();

        return redirect()->route('dashboard.dge')->with('success', 'Fichier importé avec succès.');
    }

    private function controlerFichierElecteurs($filePath, $checksum)
    {
        // Lire le contenu du fichier
        $fileContent = Storage::get($filePath);

        // Calculer l'empreinte CHECKSUM
        $calculatedChecksum = hash('sha256', $fileContent);

        // Vérifier l'empreinte CHECKSUM
        if ($calculatedChecksum !== $checksum) {
            // Enregistrer la tentative d'upload échouée
            DB::table('tentatives_uploads')->insert([
                'fichier_electeur_id' => DB::table('fichiers_electeurs')->insertGetId([
                    'nom_fichier' => basename($filePath),
                    'checksum' => $checksum,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]),
                'user_id' => Auth::id(),
                'adresse_ip' => request()->ip(),
                'checksum' => $checksum,
                'message_erreur' => 'L\'empreinte CHECKSUM ne correspond pas.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            throw new \Exception('L\'empreinte CHECKSUM ne correspond pas.');
        }

        // Vérifier le format UTF-8
        if (!mb_check_encoding($fileContent, 'UTF-8')) {
            throw new \Exception('Le fichier n\'est pas en UTF-8.');
        }
    }

    private function controlerElecteurs()
    {
        $electeurs = DB::table('temp_electeurs')->get();

        foreach ($electeurs as $electeur) {
            $problemes = [];

            // Vérifier le format de la carte d'identité
            if (strlen($electeur->numero_carte_identite) != 13) {
                $problemes[] = 'Numéro de carte d\'identité incorrect';
            }

            // Vérifier le format du numéro d'électeur
            if (strlen($electeur->numero_carte_electeur) != 10) {
                $problemes[] = 'Numéro d\'électeur incorrect';
            }

            // Ajouter d'autres contrôles ici

            if (!empty($problemes)) {
                DB::table('erreurs_electeurs')->insert([
                    'tentative_upload_id' => $electeur->tentative_upload_id,
                    'numero_carte_identite' => $electeur->numero_carte_identite,
                    'numero_carte_electeur' => $electeur->numero_carte_electeur,
                    'probleme' => implode(', ', $problemes),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}