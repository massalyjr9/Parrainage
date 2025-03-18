<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    /**
     * Affiche la liste paginée des Messages.
     */
    public function index()
    {
        // Récupère les Messages les plus récentes avec une pagination de 10 par page
        $Messages = Message::latest()->paginate(10);
        return view('electeur.Message', compact('Messages'));
    }

    /**
     * Marque toutes les Messages comme lues.
     */
    public function markAllAsRead(Request $request)
    {
        // Ici, on met à jour toutes les Messages pour indiquer qu'elles ont été lues.
        // Attention, en production, il est préférable de cibler les Messages de l'utilisateur connecté.
        Message::query()->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'Toutes les Messages ont été marquées comme lues.');
    }
}
