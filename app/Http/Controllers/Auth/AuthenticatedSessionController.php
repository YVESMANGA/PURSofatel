<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        
        return view('auth.login');
    }

    public function acceuilBo(): View
    {
        
        return view('BO.importer');
    }
    public function acceuilChef_zone(): View
    {
        
        return view('ChefZone.index');
    }
    public function acceuilTechnicien(): View
    {
        
        return view('Technicien.index');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
    
        $user = Auth::user();

    
        switch ($user->role) {
            case 'bo':
                return redirect()->route('acceuil.bo');
    
            case 'chef_zone':
                return redirect()->route('acceuil.chef_zone');
    
            case 'technicien':
                return redirect()->route('acceuil.technicien');
    
            default:
            Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Utilisateur inconnu.',
                ]);
        }
    }
    


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
