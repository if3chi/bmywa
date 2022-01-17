<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;

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

            $ip = $request->ip();
            $hashed_ip = hash('sha512', $ip);
            $newVisitor = Visitor::where('visit_date', today())->where('ip', $hashed_ip)->count() < 1;

            if ($newVisitor && !Agent::isRobot()) {

                $visitor_location = Location::get($ip);

                Visitor::create([
                    'visit_time' => now(),
                    'visit_date' => today(),
                    'ip' => $hashed_ip,
                    'browser' => Agent::browser(),
                    'platform' => Agent::platform(),
                    'device' => Agent::device(),
                    'country_code' => $visitor_location->countryCode ?? null,
                    'city_name' => $visitor_location->cityName ?? null,
                    'region_name' => $visitor_location->regionName ?? null,
                    'country_name' => $visitor_location->countryName ?? null,
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return $next($request);
    }
}
