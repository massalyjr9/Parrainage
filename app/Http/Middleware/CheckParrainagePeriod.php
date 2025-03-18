<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ParrainagePeriod;
use Carbon\Carbon;

class CheckParrainagePeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $period = ParrainagePeriod::first();

        if ($period) {
            $now = Carbon::now();
            if ($now->lt($period->start_date) || $now->gt($period->end_date)) {
                return redirect('/login/electeur')->with('error', 'La période de parrainage n\'est pas active.');
            }
        }

        return $next($request);
    }
}