<?php

namespace App\Http\Controllers;

use App\Models\DeveloperOnboarding;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        // if (!isOnboarding()) {
        //     if (isDeveloper())
        //         return view('developer.onboarding');

        //     if (isAgency())
        //         return view('agency.onboarding');

        //     if (isclient())
        //         return view('clients.onboarding');
        // }
        

        return view('home.index');
    }

    public function admin(){
        return view('home.admin');
    }
   





    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}