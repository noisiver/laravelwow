<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:20', 'min:3', 'unique:account'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:account'],
            'password' => ['required', 'confirmed', Rules\Password::min(4)],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        list($salt, $verifier) = $this->getRegistrationData(strtoupper($request->username), $request->password);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'salt' => $salt,
            'verifier' => $verifier,
            'expansion' => 2
        ]);

        event(new Registered($user));

        return redirect('/')->with('success', 'Your account successfully has been created!');
    }

    private function calculateSRP6Verifier($username, $password, $salt)
    {
        // algorithm constants
        $g = gmp_init(7);
        $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);

        // calculate first hash
        $h1 = sha1(strtoupper($username . ':' . $password), true);

        $h2 = sha1($salt . $h1, true);

        // convert to integer (little-endian)
        $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);

        // g^h2 mod N
        $verifier = gmp_powm($g, $h2, $N);

        // convert back to a byte array (little-endian)
        $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);

        // pad to 32 bytes, remember that zeros go on the end in little-endian!
        $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);

        // done!
        return $verifier;
    }

    private function getRegistrationData($username, $password): array
    {
        $salt = random_bytes(32);
        $verifier = $this->calculateSRP6Verifier($username, $password, $salt);
        return [ $salt, $verifier ];
    }
}
