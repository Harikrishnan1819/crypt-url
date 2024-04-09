<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CryptController extends Controller
{
    public function Crypt(Request $request)
    {
        // Get query parameter
        $param = $request->query('param');

        // Encrypt the parameter
        $encryptedParam = Crypt::encryptString($param);

        // Redirect with encrypted parameter
        return redirect()->route('', ['encrypted_param' => $encryptedParam]);
    }
}
