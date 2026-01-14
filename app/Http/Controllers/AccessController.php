<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;
use App\Models\ProductSpecialist;

class AccessController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'role' => 'required|string',
        ]);

        $username = trim($request->username);
        $role = $request->role;

        // ==========================
        // KLIJENT
        // ==========================
        if ($role === 'klijent') {
            $klijent = Klijent::whereRaw('LOWER(klijent) = ?', [strtolower($username)])
                            ->where('status', 'aktivan')
                            ->first();

            if ($klijent) {
                // upiši u session i redirektuj
                $request->session()->put([
                    'role'     => 'client',
                    'username' => $klijent->klijent,
                ]);

                return redirect()->route('client.dashboard');
            }

            return back()->withErrors(['username' => 'Klijent ne postoji ili nije aktivan'])->withInput();
        }

        // ==========================
        // PRODUCT SPECIALISTA
        // ==========================
        if ($role === 'product') {
            $ps = ProductSpecialist::whereRaw('LOWER(product_specialista) = ?', [strtolower($username)])
                                ->where('status', 'aktivan')
                                ->first();

            if ($ps) {
                // upiši u session i redirektuj
                $request->session()->put([
                    'role'     => 'ps',
                    'username' => $ps->product_specialista,
                ]);

                return redirect()->route('product.dashboard');
            }

            return back()->withErrors(['username' => 'Product specijalista ne postoji ili nije aktivan'])->withInput();
        }


        return back()->withErrors(['role' => 'Nepoznata rola'])->withInput();
    }

    public function logout()
    {
        // ovde možeš i session flush ako koristiš autentikaciju
        // session()->flush();

        return redirect()->route('access');
    }
}
