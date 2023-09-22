<?php

use App\Http\Controllers\AddEventController;
use App\Http\Controllers\AddJobController;
use App\Http\Controllers\AddRevenueController;
use App\Http\Controllers\AddTaskController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\ManageEventsController;
use App\Http\Controllers\ManageTasksController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PlanificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;

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
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/gestion', function () {
    return view('admin.gestion');
});

Route::get('/reporting', [ReportingController::class, 'index']);
Route::get('/data', [ReportingController::class, 'getData']);

Route::get('/gestion_evenements', [ManageEventsController::class, 'index']);

Route::get('/gestion_taches', [ManageTasksController::class, 'index']);
Route::get('/gestion_taches/{eventId}', [ManageTasksController::class, 'listByEvent']);

Route::get('/planification', [PlanificationController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout',[ SessionsController::class, 'destroy']);

Route::get('/creation', [CreationController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'update']);

Route::get('/metiers', [AddJobController::class, 'index']);
Route::post('/metiers', [AddJobController::class, 'store']);

Route::get('/evenements', [AddEventController::class, 'index']);
Route::post('/evenements', [AddEventController::class, 'store']);

Route::get('/taches', [AddTaskController::class, 'index']);
Route::post('/taches', [AddTaskController::class, 'store']);

Route::get('/recette', [AddRevenueController::class, 'index']);
Route::post('/recette', [AddRevenueController::class, 'store']);

Route::get('/job-well-done', [AddJobController::class, 'jobWellDone']);
Route::get('/event-well-done', [AddEventController::class, 'eventWellDone']);
Route::get('/task-well-done', [AddTaskController::class, 'taskWellDone']);

Route::post('/play/{id}', [ManageTasksController::class, 'play']);
Route::post('/pause/{id}', [ManageTasksController::class, 'pause']);
Route::post('/end/{id}', [ManageTasksController::class, 'end']);

Route::get('graphs', [PdfController::class, 'graphs']);
Route::get('graphs-pdf', [PdfController::class, 'graphPdf']);
