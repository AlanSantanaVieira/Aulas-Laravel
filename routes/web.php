<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

// Rota de contato--Read
Route::get('/contatos', [ContatosController::class, 'index']) ->name('contatos.index');

//Rota delete
Route::delete('/contatos/{contatoID}', [ContatosController::class, 'delete']) ->name('contatos.delete');

//Rota create - metodo get
Route::get('/contatos/create' , [ContatosController::class, 'create'])->name('contatos.create.get');

//Rota create - metodo post
Route::post('/contatos/create' , [ContatosController::class, 'create'])->name('contatos.create.post');

//Rotas de Update - método get
Route::get('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.get');  

//Rotas de Update - método put
Route::put('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.put'); 

// Rota de usuário--Read
Route::get('/usuarios', [UsuariosController::class, 'index']) ->name('usuarios.index');

//Rota delete de usuários
Route::delete('/usuarios/{contatoID}', [UsuariosController::class, 'delete']) ->name('usuarios.delete');

//Rota create usuários- metodo get
Route::get('/usuarios/create' , [UsuariosController::class, 'create'])->name('usuarios.create.get');

//Rota create usuários- metodo post
Route::post('/usuarios/create' , [UsuariosController::class, 'create'])->name('usuarios.create.post');

//Rotas de Update usuários- método get
Route::get('/usuarios/update/{userID}', [UsuariosController::class, 'update'])->name('usuarios.update.get');  

//Rotas de Update usuário- método put
Route::put('/usuarios/update/{userID}', [UsuariosController::class, 'update'])->name('usuarios.update.put'); 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function() {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');;

Route::get('/dashboard', function () {  // tela de login
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil do usuário
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
