<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CouchDBController;
use App\Http\Controllers\DocumentController;
use App\Http\Middleware\HandleCors;

Route::middleware([HandleCors::class])->group(function () {
    Route::get('/api/example', function () {
        return response()->json(['message' => 'CORS configurado']);
    });
});
Route::get('/couchdb', [CouchDBController::class, 'index']);
Route::post('/couchdb', [CouchDBController::class, 'store']);

//rutas post de ionic


Route::post('/couchdb', [UserController::class, 'register']);
//rutas de dashboard laravel



Route::get('/dashboard', [DocumentController::class, 'index'])->name('dashboard');
Route::get('/documents', [DocumentController::class, 'listDocuments'])->name('documents.list');
Route::get('/documents/{id}', [DocumentController::class, 'showDocument'])->name('documents.show');
Route::get('/documents/create', [DocumentController::class, 'createDocument'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'storeDocument'])->name('documents.store');
Route::get('/documents/{id}/edit', [DocumentController::class, 'editDocument'])->name('documents.edit');
Route::put('/documents/{id}', [DocumentController::class, 'updateDocument'])->name('documents.update');
Route::delete('/documents/{id}', [DocumentController::class, 'deleteDocument'])->name('documents.delete');
Route::get('/documents/search', [DocumentController::class, 'searchDocuments'])->name('documents.search');

Route::get('/couchdb', [UserController::class, 'listUsers']);


//mo existe





Route::get('/usuarios', [UserController::class, 'index']);
Route::post('/usuarios', [UserController::class, 'store']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);
