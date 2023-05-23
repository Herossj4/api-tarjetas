<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UnidadesController;
use App\Models\UsuarioRol;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::get('/banner', [HomeController::class, 'getBanner']);
Route::get('/menu', [MenuController::class, 'getMenu']);
Route::post('login', [LoginController::class, 'login']);
Route::any('logout', [LoginController::class, 'logout']);
Route::post('password', [LoginController::class, 'cambioContraseña']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('usuarios', [UsuarioController::class, 'getUsuarios']);
    Route::post('usuarios/crearUsuario',[UsuarioController::class, 'CrearUsuarios']);
    Route::post('usuarios/actualizarUsuario',[UsuarioController::class, 'ActualizarUsuario']);
    Route::post('usuarios/busqueda', [UsuarioController::class, 'buscando']);
    Route::post('usuarios/obtenerRolesAsignados', [UsuarioController::class, 'getRolesAsignados']);
    Route::post('usuarios/crearPrivilegios', [UsuarioController::class, 'CrearPrivilegios']);
    Route::post('usuarios/actualizarPrivilegios', [UsuarioController::class, 'ActualizarPrivilegios']);
    Route::post('usuarios/cambiarContraseña', [UsuarioController::class, 'ChangePassword']);

    Route::get('roles', [RolController::class, 'getRoles']);
    Route::post('rol/crearRol', [RolController::class, 'crearRol']);
    Route::post('rol/actualizarRol', [RolController::class, 'actualizarRol']);
    Route::get('rol/getRolesActivos', [RolController::class, 'getRolesActivos']);
    Route::get('rol/getModulos', [RolController::class, 'getModulos']);
    Route::post('rol/crearRolPrivilegios', [RolController::class, 'crearRolPrivilegios']);
    Route::post('rol/actualizarRolPrivilegios', [RolController::class, 'actualizarRolPrivilegios']);
    Route::post('rol/getRolPrivilegiosById', [RolController::class, 'getRolPrivilegiosById']);
    Route::post('rol/eliminarRolPrivilegiosById', [RolController::class, 'eliminarRolPrivilegiosById']);
});

Route::group(['prefix' => 'param'], function() {
    //Personas
    Route::get('persona', [PersonaController::class, 'getPersonas']);
    Route::post('persona/crearpersona', [PersonaController::class, 'CrearPersonas']);
    Route::post('persona/actualizarpersona', [PersonaController::class, 'actualizarPersona']);
    Route::post('persona/upload', [PersonaController::class, 'upload']);

    //Unidades
    Route::get('unidad', [UnidadesController::class, 'getUnidades']);
    Route::post('unidad/crearunidad', [UnidadesController::class, 'CrearUnidades']);
    Route::post('unidad/actualizarunidad', [UnidadesController::class, 'actualizarUnidad']);
    Route::post('unidad/obtenerunidadesByid', [UnidadesController::class, 'get_unidad_by_id']);

    //Listas Dinamicas
    Route::get('listas', [ListaController::class,'getListas']);
    Route::post('lista/crearLista', [ListaController::class, 'crearLista']);
    Route::post('lista/actualizarLista', [ListaController::class, 'actualizarLista']);
    Route::post('lista/getListasById', [ListaController::class, 'getListasId']);
    Route::get('lista/getListasP', [ListaController::class, 'get_listas_padres']);
    Route::get('lista/getListaDetalleFull', [ListaController::class, 'getListaDetalleFull']);
    Route::post('lista/crearListaDetalle', [ListaController::class, 'crearListaDetalle']);
    Route::post('lista/actualizarListaDetalle', [ListaController::class, 'actualizarListaDetalle']);
});

Route::get('hello', function() {
    $password = password_hash('0000', PASSWORD_BCRYPT, ['cost' => 15]);
    return $password;
});

Route::post('prueba',function(Request $request){
    $image = $request->file('image');
    $path = $image->store('images', 'custom'); 
    return $request + " " + $path;
});