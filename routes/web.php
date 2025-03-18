<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParrainageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElecteurController;
use App\Http\Controllers\DgeAgentLoginController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ParrainagePeriodController;
use App\Http\Middleware\CheckParrainagePeriod;
use App\Http\Middleware\CheckRole;


Route::middleware(['auth', 'role:agentdge'])->group(function () {
    Route::get('/dashboard/dge', [CandidatController::class, 'index'])->name('dashboard.dge');
    Route::resource('candidats', CandidatController::class);
    Route::get ('/parrainage-period', [ParrainagePeriodController::class, 'create'])->name('parrainage-period.create');
    Route::post('/parrainage-period', [ParrainagePeriodController::class, 'store'])->name('parrainage-period.store');
    Route::get('/dge/create-candidat', [AdminController::class, 'showCreateCandidatForm'])->name('dge.create-candidat.form');
    Route::post('/dge/create-candidat', [AdminController::class, 'createCandidat'])->name('dge.create-candidat');
    Route::get('/electeurs/import', [ElecteurController::class, 'showImportForm'])->name('electeurs.import.form');
    Route::post('/electeurs/import', [ElecteurController::class, 'import'])->name('electeurs.import');
    Route::post('/valider-importation', [ElecteurController::class, 'validerImportation'])->name('valider.importation');
    
});

Route::get('/login/dge', [DgeAgentLoginController::class, 'showLoginForm'])->name('login.dge');
Route::post('/login/dge', [DgeAgentLoginController::class, 'login'])->name('login.dge.post');


Route::get('/', function () {
    return view('public.welcome');
});
Route::middleware('check.parrainage.period')->group(function () {
    Route::get('/login/electeur', [ElecteurController::class, 'showLoginForm'])->name('login.electeur');
    Route::post('/login/electeur', [ElecteurController::class, 'login'])->name('login.electeur.post');

    Route::get('/login/candidat', [CandidatController::class, 'showLoginForm'])->name('login.candidat');
    Route::post('/login/candidat', [CandidatController::class, 'login'])->name('login.candidat.post');

    Route::get('/register', [ElecteurController::class, 'showInitialForm'])->name('electeurs.register.form');
    Route::post('/register/verify', [ElecteurController::class, 'verifyInitialInfo'])->name('electeurs.verify');
    Route::get('/register/complete', [ElecteurController::class, 'showCompletionForm'])->name('electeurs.complete.form');
    Route::post('/register/complete', [ElecteurController::class, 'completeRegistration'])->name('electeurs.complete');
    Route::get('/register/validate', [ElecteurController::class, 'showValidationForm'])->name('electeurs.validate.form');
    Route::post('/register/validate', [ElecteurController::class, 'validateCode'])->name('electeurs.validate');

});

Route::middleware(['auth','check.parrainage.period'])->group(function () {
    Route::middleware('role:candidat')->group(function () {
        Route::get('/candidatDashboard', function () {
            return view('candidat.dashboard');
        })->name('candidat.dashboard');
    });

    Route::middleware('role:electeur')->group(function () {
        Route::get('/electeurDashboard', function () {
            return view('electeur.dashboard');
        })->name('electeur.dashboard');
    });

    Route::get('/profil', [UserController::class, 'showProfile'])->name('profil');
    Route::get('/messages', [MessageController::class, 'index'])->name('message');
    Route::get('/parrainage', [ParrainageController::class, 'index'])->name('parrainage');
    Route::post('/parrainage/{candidatId}', [ParrainageController::class, 'parrainer'])->name('parrainage.parrainer');
    Route::get('/parrainage/verify', [ParrainageController::class, 'showVerificationForm'])->name('parrainage.verify.form');
    Route::post('/parrainage/verify', [ParrainageController::class, 'verifyCode'])->name('parrainage.verify');
});

Route::get('/listeCandidats', [CandidatController::class, 'idi'])->name('listeCandidats');
Route::get('/contact', function () {
    return view('public.contact');
});

Route::get('/Statistiques', [StatistiqueController::class, 'index'])->name('statistiques');

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});