<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function subirImagen(Request $request) {

        $file = $request->file('file');
        $path = public_path() . '/uploads/';
        $fileName = uniqid() . $file->getClientOriginalName();
    
        $file->move($path, $fileName);
        
        return "hola mundo";
    }
}
