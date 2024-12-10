<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CouchDBController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('COUCHDB_HOST') . ':' . env('COUCHDB_PORT'),
        ]);
    }

    public function index()
{
    try {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        // Realizar la solicitud con autenticación básica
        $response = $this->client->request('GET', '/educol/_all_docs?include_docs=true', [
            'auth' => [$username, $password]  // Incluir credenciales
        ]);
        
        $data = json_decode($response->getBody()->getContents(), true);

        return response()->json($data); // Devuelve la respuesta como JSON
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    
}
}
