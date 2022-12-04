<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio', [
        'experiences' => Experience::all(),
        'projects' => Project::all(),
        'skills'   => Skill::all(),
    ]);
});

Route::get('/admin', [ExperienceController::class, 'admin'])->middleware(['auth', 'superAdmin'])->name('admin');

Route::post('/experience/store', [ExperienceController::class, 'store'])->middleware(['auth', 'superAdmin'])->name('experience.store');
Route::post('/experience/update/{id}', [ExperienceController::class, 'update'])->middleware(['auth', 'superAdmin'])->name('experience.update');
Route::delete('/experience/destroy/{id}', [ExperienceController::class, 'destroy'])->middleware(['auth', 'superAdmin'])->name('experience.destroy');

Route::post('/project/store', [ProjectController::class, 'store'])->middleware(['auth', 'superAdmin'])->name('project.store');
Route::post('/project/update/{id}', [ProjectController::class, 'update'])->middleware(['auth', 'superAdmin'])->name('project.update');
Route::delete('/project/destroy/{id}', [ProjectController::class, 'destroy'])->middleware(['auth', 'superAdmin'])->name('project.destroy');

Route::post('/skill/store', [SkillController::class, 'store'])->middleware(['auth', 'superAdmin'])->name('skill.store');
Route::post('/skill/update/{id}', [SkillController::class, 'update'])->middleware(['auth', 'superAdmin'])->name('skill.update');
Route::delete('/skill/destroy/{id}', [SkillController::class, 'destroy'])->middleware(['auth', 'superAdmin'])->name('skill.destroy');

Route::post('/message/store', [MessageController::class, 'store'])->middleware(['auth', 'superAdmin'])->name('message.store');
Route::delete('/message/delete/{id}', [MessageController::class, 'destroy'])->middleware(['auth', 'superAdmin'])->name('message.destroy');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
