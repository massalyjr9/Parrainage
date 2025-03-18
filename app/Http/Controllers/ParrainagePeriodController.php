<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParrainagePeriod;

class ParrainagePeriodController extends Controller
{
    public function create()
    {
        $period = ParrainagePeriod::first();
        return view('dge.set_parrainage_period', compact('period'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        ParrainagePeriod::updateOrCreate(
            ['id' => 1],
            ['start_date' => $request->start_date, 'end_date' => $request->end_date]
        );

        return redirect()->route('dashboard.dge')->with('success', 'Période de parrainage mise à jour avec succès.');
    }
}
