<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientOnboarding;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $userId = auth()->user()->id;
            // Check if the user ID exists in the agency_onboarding table
            $exists = ClientOnboarding::where('user_id', $userId)->exists();
       
            if (!$exists) {
                // Redirect to the onboarding form route if the user ID is not found
                return redirect()->route('clients.onboarding');
            }
            
            return $next($request);
        });
    }
}
