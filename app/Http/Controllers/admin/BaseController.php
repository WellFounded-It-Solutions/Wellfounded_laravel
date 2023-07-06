<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $userId = auth()->user()->id;
            
            // Check if the user ID exists in the agency_onboarding table
            $exists = User::where('id', $userId)->exists();
            
            if (!$exists) {
                // Redirect to the onboarding form route if the user ID is not found
                return redirect()->route('admin.dashboard');
            }
            
            return $next($request);
        });
    }
}
