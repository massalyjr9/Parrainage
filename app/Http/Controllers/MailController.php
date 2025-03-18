<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidatAccountCreated;
use App\Models\User;

class MailController extends Controller
{
    public function sendCandidatAccountCreatedEmail(User $user, $password)
    {
        Mail::to($user->email)->send(new CandidatAccountCreated($user, $password));
        return response()->json(['message' => 'Email sent successfully']);
    }
}