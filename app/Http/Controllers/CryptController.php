<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CryptController extends Controller
{

    public function encrypt()
   {
    // dd(3245678);
        $encrypted = Crypt::encryptString('Arjun');
        print_r($encrypted);
   }

   public function decrypt()
   {
        $decrypt= Crypt::decryptString('eyJpdiI6Im5GRldTNnEzTDBXbGpXai9Bb25iK1E9PSIsInZhbHVlIjoiTC8xdGxydmEwd1Q1cEN4RDJFcmQ1UT09IiwibWFjIjoiZjY4OTBkZGI4ODhkMGYzMGYzN2QyMzA5ZGU2MTIxYzk0ZThkMzg2ZjAxYmJkMzUxYmExMGJjYzFjMTAyOWU1OCIsInRhZyI6IiJ9`');
        print_r($decrypt);
   }

    // public function methodName($id){
    //     // $data = Crypt::decrypt($id);
    //     return view('crypt');
    //     // dd($data);

    //   }
    
    public function encryptParams(Request $request)
    {
        // Get query parameter
        $param = $request->query('param');
        // dd($request->query());
        // Encrypt the parameter
        $encryptedParam = Crypt::encrypt($param);
        dd($encryptedParam);

        $decryptedParam = Crypt::decrypt($encryptedParam);
        dd($decryptedParam);

        // Redirect with encrypted parameter
        return redirect()->route('decrypt.params', ['encrypted_param' => $encryptedParam]);
    }

    public function decryptParams(Request $request)
    {
        dd($request->query('encrypted_param'));
        // Decrypt the encrypted parameter
        $decryptedParam = Crypt::decrypt($request->query('encrypted_param'), 54);
        // Now you can use $decryptedParam as needed
        return response()->json(['decrypted_param' => $decryptedParam]);
    }
}
