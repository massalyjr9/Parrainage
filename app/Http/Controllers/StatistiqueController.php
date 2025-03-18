<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Electeur;
use App\Models\CompteElecteur;

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        // Statistiques générales
        $totalElecteurs = Electeur::count();
        $totalParrainages = Electeur::where('status', true)->count();
        $tauxParticipation = $totalElecteurs > 0 ? ($totalParrainages / $totalElecteurs) * 100 : 0;

        // Recherche d'un candidat spécifique
        $candidat = null;
        if ($request->has('search') && $request->search != '') {
            $candidat = Candidat::where('nomPartiPolitique', 'LIKE', "%{$request->search}%")
                ->orWhere('numCarteElecteur', 'LIKE', "%{$request->search}%")
                ->first();
        }

        return view('public.statistique', compact('totalElecteurs', 'totalParrainages', 'tauxParticipation', 'candidat'));
    }
}

