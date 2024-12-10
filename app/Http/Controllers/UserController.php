<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    private $couchdbUrl = 'http://127.0.0.1:5984/list_usuarios';
    private $username = 'admin'; // Cambia por tu nombre de usuario de CouchDB
    private $password = '12345'; // Cambia por tu contraseña de CouchDB

    public function index()
    {
        $response = Http::withBasicAuth($this->username, $this->password)->get($this->couchdbUrl . '/_all_docs?include_docs=true');
        return response()->json($response->json());
    }

    public function store(Request $request)
    {
        $datosUsuario = $request->all();
        $response = Http::withBasicAuth($this->username, $this->password)->post($this->couchdbUrl, [
            'json' => $datosUsuario
        ]);
        return response()->json($response->json());
    }

    public function update(Request $request, $id)
    {
        $datosUsuario = $request->all();
        $docResponse = Http::withBasicAuth($this->username, $this->password)->get("{$this->couchdbUrl}/{$id}");
        $doc = $docResponse->json();
        $response = Http::withBasicAuth($this->username, $this->password)->put("{$this->couchdbUrl}/{$id}?rev={$doc['_rev']}", [
            'json' => array_merge($doc, $datosUsuario)
        ]);
        return response()->json($response->json());
    }

    public function destroy($id)
    {
        $docResponse = Http::withBasicAuth($this->username, $this->password)->get("{$this->couchdbUrl}/{$id}");
        $doc = $docResponse->json();
        $response = Http::withBasicAuth($this->username, $this->password)->delete("{$this->couchdbUrl}/{$id}?rev={$doc['_rev']}");
        return response()->json($response->json());
    }
}
