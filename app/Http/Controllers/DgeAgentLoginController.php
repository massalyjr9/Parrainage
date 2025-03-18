<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DgeAgentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_dge');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Vérifier si l'utilisateur a le rôle d'agent DGE
            if (Auth::user()->role === 'agentdge') {
                return redirect()->intended('/dashboard/dge');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Vous n\'êtes pas autorisé à accéder à cette section.']);
            }
        }

        return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
    }
}