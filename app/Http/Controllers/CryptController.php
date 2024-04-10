<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CryptController extends Controller
{

    public function index(Request $request)
    {
        $decryptedValue = $request->query('encrypted_value');
       
        return "Decrypted value: $decryptedValue";
    }

//     public function encrypt()
//    {
//     // dd(3245678);
//         $encrypted = Crypt::encryptString('Arjun');
//         print_r($encrypted);
//    }

//    public function decrypt()
//    {
//         $decrypt= Crypt::decryptString('eyJpdiI6IjE1ekg1WVp2c1VKbmhSWnBGZXFJRVE9PSIsInZhbHVlIjoiSWhzL0JoUUNYQkIvYjVSRHRXRWZOZz09IiwibWFjIjoiOWE4YzMyZTA0ZDg4YzI4M2FlMTlkM2I3N2IxYzg3ODI4NzliY2ZkYzA1YmI3OGM0YTQyZmFkMjY3OWUwYjRhNiIsInRhZyI6IiJ9`');
//         print_r($decrypt);
//    }

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
