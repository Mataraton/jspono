<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegistroController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
            'institucion' => 'required|string',
            'tipoIdentificacion' => 'required|string',
            'numeroIdentificacion' => 'required|integer',
            'correo' => 'required|email',
            'password' => 'required|string',
        ]);

        // Crear el usuario en CouchDB
        $client = new Client(['base_uri' => 'http://127.0.0.1:5984/']);
        $user = [
            '_id' => uniqid(),
            'type' => 'user',
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'edad' => $validatedData['edad'],
            'institucion' => $validatedData['institucion'],
            'tipoIdentificacion' => $validatedData['tipoIdentificacion'],
            'numeroIdentificacion' => $validatedData['numeroIdentificacion'],
            'correo' => $validatedData['correo'],
            'password' => bcrypt($validatedData['password']),
        ];

        $response = $client->post('usuarios_db', [
            'json' => $user
        ]);

        return response()->json(['message' => 'Usuario registrado exitosamente'], 201);
    }
}
