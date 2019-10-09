<?php

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

Route::get('/', 'InicioController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('', 'AdminController@index');
    /*RUTAS DE USUARIO*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar_usuario');
    /*RUTAS DE PERMISO*/
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');
    /*RUTAS DEL MENU*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@eliminar')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*RUTAS ROL*/
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
    /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');
});
/*RUTAS BODEGA*/
Route::get('bodega', 'BodegaController@index')->name('bodega');
Route::get('bodega/crear', 'BodegaController@crear')->name('crear_bodega');
Route::post('bodega', 'BodegaController@guardar')->name('guardar_bodega');
Route::get('bodega/{id}/editar', 'BodegaController@editar')->name('editar_bodega');
Route::put('bodega/{id}', 'BodegaController@actualizar')->name('actualizar_bodega');
Route::delete('bodega/{id}', 'BodegaController@eliminar')->name('eliminar_bodega');
/*RUTAS CATEGORIA*/
Route::get('categoria', 'CategoriaController@index')->name('categoria');
Route::get('categoria/crear', 'CategoriaController@crear')->name('crear_categoria');
Route::post('categoria', 'CategoriaController@guardar')->name('guardar_categoria');
Route::get('categoria/{id}/editar', 'CategoriaController@editar')->name('editar_categoria');
Route::put('categoria/{id}', 'CategoriaController@actualizar')->name('actualizar_categoria');
Route::delete('categoria/{id}', 'CategoriaController@eliminar')->name('eliminar_categoria');
/*RUTAS PRODUCTO*/
Route::get('producto', 'ProductoController@index')->name('producto');
Route::get('producto/crear', 'ProductoController@crear')->name('crear_producto');
Route::post('producto', 'ProductoController@guardar')->name('guardar_producto');
Route::get('producto/{id}/editar', 'ProductoController@editar')->name('editar_producto');
Route::put('producto/{id}', 'ProductoController@actualizar')->name('actualizar_producto');
Route::delete('producto/{id}', 'ProductoController@eliminar')->name('eliminar_producto');
/*RUTAS CIUDAD*/
Route::get('ciudad', 'CiudadController@index')->name('ciudad');
Route::get('ciudad/crear', 'CiudadController@crear')->name('crear_ciudad');
Route::post('ciudad', 'CiudadController@guardar')->name('guardar_ciudad');
Route::get('ciudad/{id}/editar', 'CiudadController@editar')->name('editar_ciudad');
Route::put('ciudad/{id}', 'CiudadController@actualizar')->name('actualizar_ciudad');
Route::delete('ciudad/{id}', 'CiudadController@eliminar')->name('eliminar_ciudad');
/*RUTAS DEPARTAMENTOS*/
Route::get('depto', 'DeptoController@index')->name('depto');
Route::get('depto/crear', 'DeptoController@crear')->name('crear_depto');
Route::post('depto', 'DeptoController@guardar')->name('guardar_depto');
Route::get('depto/{id}/editar', 'DeptoController@editar')->name('editar_depto');
Route::put('depto/{id}', 'DeptoController@actualizar')->name('actualizar_depto');
Route::delete('depto/{id}', 'DeptoController@eliminar')->name('eliminar_depto');
/*RUTAS TIPO_DOC*/
Route::get('tipo_doc', 'Tipo_docController@index')->name('tipo_doc');
Route::get('tipo_doc/crear', 'Tipo_docController@crear')->name('crear_tipo_doc');
Route::post('tipo_doc', 'Tipo_docController@guardar')->name('guardar_tipo_doc');
Route::get('tipo_doc/{id}/editar', 'Tipo_docController@editar')->name('editar_tipo_doc');
Route::put('tipo_doc/{id}', 'Tipo_docController@actualizar')->name('actualizar_tipo_doc');
Route::delete('tipo_doc/{id}', 'Tipo_docController@eliminar')->name('eliminar_tipo_doc');
/*RUTAS TIPO_PERSONA*/
Route::get('tipo_per', 'Tipo_perController@index')->name('tipo_per');
Route::get('tipo_per/crear', 'Tipo_perController@crear')->name('crear_tipo_per');
Route::post('tipo_per', 'Tipo_perController@guardar')->name('guardar_tipo_per');
Route::get('tipo_per/{id}/editar', 'Tipo_perController@editar')->name('editar_tipo_per');
Route::put('tipo_per/{id}', 'Tipo_perController@actualizar')->name('actualizar_tipo_per');
Route::delete('tipo_per/{id}', 'Tipo_perController@eliminar')->name('eliminar_tipo_per');
/*RUTAS PERSONA*/
Route::get('persona', 'PersonaController@index')->name('persona');
Route::get('persona/crear', 'PersonaController@crear')->name('crear_persona');
Route::post('persona', 'PersonaController@guardar')->name('guardar_persona');
Route::get('persona/{id}/editar', 'PersonaController@editar')->name('editar_persona');
Route::put('persona/{id}', 'PersonaController@actualizar')->name('actualizar_persona');
Route::delete('persona/{id}', 'PersonaController@eliminar')->name('eliminar_persona');
/*RUTAS ENTRADA*/
Route::get('entrada', 'EntradaController@index')->name('entrada');
Route::get('entrada/crear', 'EntradaController@crear')->name('crear_entrada');
Route::post('entrada', 'EntradaController@guardar')->name('guardar_entrada');
Route::get('entrada/{id}/editar', 'EntradaController@editar')->name('editar_entrada');
Route::get('entrada/{id}/index', 'EntradaController@nueva')->name('nueva_entrada');
Route::put('entrada/{id}', 'EntradaController@actualizar')->name('actualizar_entrada');
Route::delete('entrada/{id}', 'EntradaController@eliminar')->name('eliminar_entrada');