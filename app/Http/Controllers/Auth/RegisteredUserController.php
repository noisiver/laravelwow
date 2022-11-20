<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\SRP6Service;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, SRP6Service $SRP6Service)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:20', 'min:3', 'unique:account'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:account'],
            'password' => ['required', 'confirmed', Rules\Password::min(4)],
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $validated['username'] = strtoupper($validated['username']);

        $verify = $SRP6Service->getSaltAndVerifier($validated['username'], $validated['password']);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'salt' => $verify['salt'],
            'verifier' => $verify['verifier'],
            'expansion' => 2
        ]);

        event(new Registered($user));

        return redirect('/')->with('success', 'Your account successfully has been created!');
    }
}
