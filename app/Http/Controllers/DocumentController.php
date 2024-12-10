<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function listDocuments()
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        // Petición a CouchDB para obtener todos los documentos
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:5984/educol/_all_docs', [
            'auth' => [$username, $password], // Añadimos autenticación
            'query' => ['include_docs' => 'true']
        ]);

        $data = json_decode($response->getBody());

        return view('documents.list', ['documents' => $data->rows]);
    }

    public function searchDocuments(Request $request)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        $filters = $request->only(['author', 'date']);
        
        // Query a CouchDB para aplicar los filtros
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:5984/educol/_find', [
            'auth' => [$username, $password], // Añadimos autenticación
            'json' => [
                'selector' => [
                    'author' => $filters['author'] ?? null,
                    'date' => $filters['date'] ?? null,
                ]
            ]
        ]);

        $data = json_decode($response->getBody());

        return view('documents.list', ['documents' => $data->docs]);
    }

    public function showDocument($id)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        // Obtener el documento por ID
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:5984/educol/{$id}", [
            'auth' => [$username, $password] // Añadimos autenticación
        ]);
        $document = json_decode($response->getBody());

        return view('documents.show', ['document' => $document]);
    }

    public function createDocument()
    {
        return view('documents.create');
    }

    public function storeDocument(Request $request)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:5984/educol', [
            'auth' => [$username, $password], // Añadimos autenticación
            'json' => $request->all()
        ]);

        return redirect()->route('documents.list');
    }

    public function editDocument($id)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        // Obtener documento para editar
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:5984/educol/{$id}", [
            'auth' => [$username, $password] // Añadimos autenticación
        ]);
        $document = json_decode($response->getBody());

        return view('documents.edit', ['document' => $document]);
    }

    public function updateDocument(Request $request, $id)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', "http://localhost:5984/educol/{$id}", [
            'auth' => [$username, $password], // Añadimos autenticación
            'json' => $request->all()
        ]);

        return redirect()->route('documents.show', $id);
    }

    public function deleteDocument($id)
    {
        // Recuperar las credenciales del archivo .env
        $username = env('COUCHDB_USERNAME');
        $password = env('COUCHDB_PASSWORD');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('DELETE', "http://localhost:5984/educol/{$id}", [
            'auth' => [$username, $password] // Añadimos autenticación
        ]);

        return redirect()->route('documents.list');
    }
}
