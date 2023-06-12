<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is online
        if (auth()->user()->status == "online") {
            // Get the user's last activity time as a Carbon object
            $last_activity = session(Auth::id() . "_last_activity");

            // Convert the Carbon object to a timestamp
            $last_activity_timestamp = $last_activity->timestamp;
            // Check if the user's last activity was more than 10 minutes ago
            if (time() - $last_activity_timestamp > 600) {
                // The user's last activity was more than 10 minutes ago
                // remove last_activity from session
                $request->session()->forget(Auth::id() . "_last_activity");
                // set the user's status to offline
                Auth::user()->status = "offline";
                Auth::user()->save();
                $log = Log::where('user_id', Auth::id())
                    ->whereNull('time_out')
                    ->latest()
                    ->first();

                $log->update([
                    'time_out' => now(),
                ]);
                //regenerate   session
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                // logout the user
                Auth::logout();
                // Redirect to the login page
                return redirect()->route('login.index')->with('errorAlert', 'Your account is inactive due to inactivity. Please login again.');
            }
            // The user's last activity was less than 10 minutes ago
            // Update last activity to the current time
            session([Auth::id() . "_last_activity" => now()]);
            return $next($request);
        }
        if (auth()->user()->status == "inactive") {
            return redirect()->route('login.index')->with('errorAlert', 'Your account is inactive. Please contact the administrator.');
        }
        if (auth()->user()->status == "offline") {
            return redirect()->route('login.index')->with('errorAlert', 'Your account is offline due to inactive or force logout.');
        }
        $request->session()->forget(Auth::id() . "_last_activity");
        return redirect()->route('login.index');
    }
}
