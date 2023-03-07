<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ImageController::class, 'inicioPerfil'])->name('dashboard');

Route::get('/shows', [ImageController::class, 'shows'])->name('shows');

Route::get('/myPhotos', [UsersController::class, 'listado']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Añdimos config
    Route::get('/config',[ProfileController::class,'config'])->name('profile.config');
    //Añadimos Update Config
    Route::patch('/profile', [ProfileController::class, 'updateConfig'])->name('profile.updateConfig');
    //Guardar COmentario
    Route::patch('/comentar/{id}',[CommentController::class, 'store'])->name('uploadComment');
});
Route::delete('/borrarComentario/{comment}',[CommentController::class, 'destroy'])->name('deleteCom');

Route::delete('/delete/{image}',[ImageController::class,'destroy'])->name('borrarPubli');
//Ver publicacion INdividual
//Ver Publicacion de cualquier usuario individualmente

//Ver todas publicaciones del usuario logeado
Route::get('/publicacion/{id}',[ImageController::class,'verPubli'])->name('publiUsuario');


Route::get('/misPublicaciones',[ImageController::class,'inicioPerfil'])->name('miPerfil');


//Subir Nueva Publicacion

Route::get('/upload',[ImageController::class, 'upload'])->name('upload');
Route::patch('/upload',[ImageController::class, 'store'])->name('store');


//Ver Todos los perfiles
Route::get('/perfiles',[UsersController::class, 'mostrarGente'])->name('verGente');


require __DIR__.'/auth.php';
