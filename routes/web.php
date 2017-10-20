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
//rutas de administrador
Route::resource('admin/turno', 'TurnoController');
//metodo para rutas en un controller: "return redirect()->route('home');"
Route::resource('admin/plantel', 'PlantelController');
Route::resource('admin/nivel', 'NivelController');
Route::resource('admin/cuatrimestre', 'CuatrimestreController');
Route::resource('admin/administrador', 'AdministradorController');
Route::resource('admin/carrera', 'CarreraController');
Route::resource('admin/profesor', 'ProfesorController');
Route::resource('admin/grupo', 'GrupoController');
Route::resource('admin/alumno', 'AlumnoController');
Route::resource('admin/materia', 'MateriaController');
Route::resource('admin/grupoplantel', 'GrupoPlantelController');

//calendario
Route::get('admin/calendario/home','HorarioController@index');
Route::get('admin/calendario/horario','HorarioController@horarios');
Route::get('admin/calendario/estadisticas','HorarioController@estadisticas');
Route::get('admin/calendario/chartjs','HorarioController@chartjs');
Route::get('admin/calendario/pdfview','HorarioController@pdfview');
Route::get('admin/calendario/manual','HorarioController@manual');
Route::get('admin/calendario/automatico','HorarioController@automatico');
Route::get('admin/calendario/estadistico','HorarioController@estadistico');
Route::get('admin/calendario/crud','HorarioController@crudsito');
Route::get('admin/calendario/crud_elimina','HorarioController@mata');
Route::get('admin/calendario/crud_descarga','HorarioController@descarga');

//EVALUACION DOCENTE| ADMINISTRATIVA 

Route::get('Alumnos/home', 'AlumnoDocenteController@Create');

Route::get('Alumnos/Alumno', 'AlumnoDocenteController@index');
Route::post('/Show', 'AlumnoDocenteController@Show');
Route::post('/Store', 'AlumnoDocenteController@Store');

Route::get('Alumnos/AlumnoAdmin', 'AlumnoAdminController@index');
Route::post('/ShowAdmin', 'AlumnoAdminController@ShowAdmin');
Route::post('/StoreAdmin', 'AlumnoAdminController@StoreAdmin');

Route::get('AdministradorEvaluacion/ResultadosDocentes', 'ResultadoDocenteController@index');
Route::get('AdministradorEvaluacion/ResultadosAdministrativos', 'ResultadoAdministrativoController@index');



//


Route::get('/', function () {
    return view('welcome');
});
Route::get('superUser/horario', function () {
    return view('horario');
});
Route::get('superUser/calificacion', function () {
    return view('calificacion');
});
Route::get('superUser/encuesta', function () {
    return view('encuesta');
});
Route::get('superUser/encuesta2', function () {
    return view('encuesta2');
});


Route::get('/superUser', function () {
    return view('welcome');
});
//ALTER TABLE turno AUTO_INCREMENT = 1
Route::resource('superUser/turno', 'TurnoController');
//metodo para rutas en un controller: "return redirect()->route('home');"
Route::resource('superUser/plantel', 'PlantelController');
Route::resource('superUser/nivel', 'NivelController');
Route::resource('superUser/cuatrimestre', 'CuatrimestreController');
Route::resource('superUser/administrador', 'AdministradorController');
Route::resource('superUser/carrera', 'CarreraController');
Route::resource('superUser/profesor', 'ProfesorController');
Route::resource('superUser/grupo', 'GrupoController');
Route::resource('superUser/alumno', 'AlumnoController');
Route::resource('superUser/materia', 'MateriaController');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::prefix('admin')->group(function(){
	Route::get('/','AdminController@index')->name('admin.dashboard');
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
});
Route::prefix('profesor')->group(function(){
	Route::get('/','iniciopController@index')->name('profesor.dashboard');
	Route::get('/login','Auth\ProfesorLoginController@showLoginForm')->name('profesor.login');
	Route::post('/login','Auth\ProfesorLoginController@login')->name('profesor.login.submit');
});

Route::prefix('superUser')->group(function(){
    Route::get('/login','Auth\SuperUserLoginController@showLoginForm')->name('superUser.login');
    Route::post('/login','Auth\SuperUserLoginController@login')->name('superUser.login.submit');
});
    Route::get('/superUser','SupController@index')->name('superUser.dashboard');


Route::prefix('alumno')->group(function(){
	Route::get('/','inicioaController@index')->name('login.dashboard');
});


// RUTAS DEK MODULO CALIFICACIONES
Route::get('administrador1', function () {
    return view('admin/loginadmin');
});
Route::get('/usradmin', 'inicioadminController@login');
Route::post('/usradmin', 'inicioadminController@login');
Route::get('/calificacion', 'inicioadminController@index');
Route::post('/alumnos', 'inicioadminController@show');
Route::post('/plantel_maestros', 'inicioadminController@show');
Route::post('/plantel_alumnos', 'inicioadminController@show_alumnos');
Route::post('/reporte_final', 'inicioadminController@show_reporte');
Route::post('/detalle_reporte', 'inicioadminController@detail_reporte');
Route::post('/detalle_maestro', 'inicioadminController@detail_maestro');
Route::post('/detalle_graficas', 'inicioadminController@detail_graficas');
Route::post('/detalle_alumno', 'inicioadminController@detail_alumno');
Route::post('/detalle_update', 'inicioadminController@update');
Route::get('/detalle_update', 'inicioadminController@update');
Route::post('/detalle_update_faltas', 'inicioadminController@update_faltas');
Route::get('/detalle_update_faltas', 'inicioadminController@update_faltas');
Route::post('/lista', 'inicioadminController@detail_lista');
Route::post('/parcial_activo', 'inicioadminController@parcial');
Route::post('/parcial_activo_bach', 'inicioadminController@parcial_bach');
Route::post('/activar_fecha', 'inicioadminController@activar');
Route::post('/activar_fecha_bach', 'inicioadminController@activar_bach');
Route::get('/logoutad', 'inicioadminController@logout');
Route::post('/logoutad', 'inicioadminController@logout');

//profesor
Route::post('/usrmaestro', 'iniciopController@login');
Route::get('/usrmaestro', 'iniciopController@login');
Route::post('/inicio_maestro', 'iniciopController@index');
Route::get('/inicio_maestro', 'iniciopController@index');
Route::post('/show', 'iniciopController@show');
Route::post('/insert', 'iniciopController@store');
Route::post('/update', 'iniciopController@update');
Route::post('/insert_bach', 'iniciopController@store_bach');
Route::post('/update_bach', 'iniciopController@update_bach');
//Route::get('/logout', 'iniciopController@logout');
//Route::post('/logout', 'iniciopController@logout');


Route::get('/boleta', 'inicioaController@boleta');
Route::post('/boleta', 'inicioaController@boleta');
Route::get('/logout_alumno', 'inicioaController@logout');
Route::post('/logout_alumno', 'inicioaController@logout');

Route::post('csrf', function(){
    if(Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
