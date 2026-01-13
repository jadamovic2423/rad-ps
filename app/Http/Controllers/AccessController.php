<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\KlijentController;

class AccessController extends Controller
{
    public function login(Request $request)
    {
        $role = $request->role;

        if ($role === 'klijent') {
            return redirect()->action([KlijentController::class, 'index']);
        }

        if ($role === 'product') {
            return redirect()->action([ProductSpecialistController::class, 'index']);
        }

        return back()->withErrors(['role' => 'Nepoznata rola']);
    }
}
