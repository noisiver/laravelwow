<?php

namespace App\Services;

class SRP6Service
{
    public function verifyLogin($username, $password, $salt, $verifier)
    {
        // re-calculate the verifier using the provided username + password and the stored salt
        $checkVerifier = $this->calculateSRP6Verifier($username, $password, $salt);

        // compare it against the stored verifier
        return ($verifier === $checkVerifier);
    }

    public function getSaltAndVerifier($username, $password): array
    {
        $salt = random_bytes(32);
        $verifier = $this->calculateSRP6Verifier($username, $password, $salt);

        return compact('salt', 'verifier');
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
}
