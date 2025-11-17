<?php

namespace App\Http\Controllers;

use App\checklistmaster;
use App\itemsv3rkakl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() 
    {
        $title = 'Dashboard';

        $user = Auth::user();
        $role = $user->roles()->pluck('name')->first();
        // ---------------------------------------------------------------------

            return view('dashboard.index', [
                'title' => $title
            ]);
        
    }

}


