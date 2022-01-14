<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;

class TrackVisitors
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
        try {

            $ip = hash('sha512', $request->ip());

            $newVisitor = Visitor::where('visit_date', today())->where('visitor_ip', $ip)->count() < 1;

            if ($newVisitor) {
                Visitor::create([
                    'visit_time' => now(),
                    'visit_date' => today(),
                    'visitor_ip' => $ip,
                    'visitor_browser' => Agent::browser(),
                    'visitor_platform' => Agent::platform(),
                    'visitor_device' => Agent::device(),
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return $next($request);
    }
}
