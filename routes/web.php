<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ConvocatoriaController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
    Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
    Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
    //Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

 
    Route::get('/periodos', [PeriodoController::class, 'index'])->name('periodos.index');
    Route::get('/periodos/create', [PeriodoController::class, 'create'])->name('periodos.create');
    Route::post('/periodos', [PeriodoController::class, 'store'])->name('periodos.store');
    Route::get('/periodos/{periodo}/edit', [PeriodoController::class, 'edit'])->name('periodos.edit');
    Route::put('/periodos/{periodo}', [PeriodoController::class, 'update'])->name('periodos.update');
    //Route::delete('/periodos/{periodo}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');

    
    Route::get('/convocatorias', [ConvocatoriaController::class, 'index'])->name('convocatorias.index');
    Route::get('/convocatorias/create', [ConvocatoriaController::class, 'create'])->name('convocatorias.create');
    Route::post('/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatorias.store');
    Route::get('/convocatorias/{convocatoria}/edit', [ConvocatoriaController::class, 'edit'])->name('convocatorias.edit');
    Route::put('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'update'])->name('convocatorias.update');
    //Route::get('/convocatorias/{convocatoria}/show', [ConvocatoriaController::class, 'show'])->name('convocatorias.show');
   
    Route::delete('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'destroy'])
        ->name('convocatorias.destroy');
   
   
   Route::get('/convocatorias/pdf/{id}', [ConvocatoriaController::class, 'generarPDF'])->name('convocatorias.pdf');



   //rutas para permisos de usuarios
   //Route::get('/permisos_usuarios', [App\Http\Controllers\PermisoUsuarioController::class, 'index'])->name('permisos_usuarios.index');
   Route::get('/permisos_usuarios/{user}/edit', [App\Http\Controllers\PermisoUsuarioController::class, 'edit'])->name('permisos_usuarios.edit');
   Route::put('/permisos_usuarios/{user}', [App\Http\Controllers\PermisoUsuarioController::class, 'update'])->name('permisos_usuarios.update');

});


Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});






