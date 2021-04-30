<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {  return view('index'); })->name('index');
Route::get('/about', function () {  return view('about'); })->name('about');
Route::get('/contact', function () {  return view('contact'); })->name('contact');
Route::get('/event', function () {  return view('event'); })->name('event');
Route::get('/adminreg', function () {  return view('adminreg'); })->name('adminreg');


//web master registration
Route::post('/adminreg', [App\Http\Controllers\RegisterController::class, 'adminreg'])->name('adminreg');
Route::post('/createadmin', [App\Http\Controllers\RegisterController::class, 'createadmin'])->name('createadmin');


Route::post('/create-contact', [App\Http\Controllers\ContactController::class, 'store'] )->name('create-contact');
Route::get('/biography/{id}', [App\Http\Controllers\TrusteeController::class, 'biography'])->name('biography');
Route::get('/blog-post/{id}', [App\Http\Controllers\PostController::class, 'post'])->name('blog-post');
Route::get('/projects/{id}', [App\Http\Controllers\ProjectsController::class, 'projects'] )->name('projects');
Route::get('/upcomingEvents', [App\Http\Controllers\UpcomingEventsController::class, 'event'] )->name('upcomingEvents');


Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
/**
 * contact routes
 */
       Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'] )->name('contacts');
       Route::get('/recent-contacts', [App\Http\Controllers\ContactController::class, 'recent'] )->name('recent-contacts');
       Route::get('/contact-show/{id}', [App\Http\Controllers\ContactController::class, 'show'] )->name('contact-show');
       Route::patch('/contact-update/{id}', [App\Http\Controllers\ContactController::class, 'update'] )->name('contact-update');
       Route::delete('/contact-destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'] )->name('contact-destroy');
//end

/**
 * admin routes
 *
 */

      Route::get('/admin', function () {  return view('server.admin.create'); })->name('admin')->middleware('auth');
      Route::post('/admin-create', [App\Http\Controllers\AdminController::class, 'store'] )->name('admin-create');
      Route::get('/admins', [App\Http\Controllers\AdminController::class, 'index'] )->name('admins');
      Route::get('/admin-show/{id}', [App\Http\Controllers\AdminController::class, 'show'] )->name('admin-show');
      Route::patch('/admin-update/{id}', [App\Http\Controllers\AdminController::class, 'update'] )->name('admin-update');
      Route::delete('/admin-destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroy'] )->name('admin-destroy');
//end

/**
 * trustee routes
 */
      Route::get('/trustee', function () {  return view('server.trustee.create'); })->name('trustee');
      Route::post('/trustee-create', [App\Http\Controllers\TrusteeController::class, 'store'] )->name('trustee-create');
      Route::get('/trustees', [App\Http\Controllers\TrusteeController::class, 'index'] )->name('trustees');
      Route::get('/trustee-show/{id}', [App\Http\Controllers\TrusteeController::class, 'show'] )->name('trustee-show');
      Route::patch('/trustee-update/{id}', [App\Http\Controllers\TrusteeController::class, 'update'] )->name('trustee-update');
      Route::delete('/trustee-destroy/{id}', [App\Http\Controllers\TrusteeController::class, 'destroy'] )->name('trustee-destroy');


/**
 * Upcoming Events routes
 */
    Route::get('/upcomingevent', function () {  return view('server.upcomingevent.create'); })->name('upcomingevent');
    Route::post('/upcomingevents-create', [App\Http\Controllers\UpcomingEventsController::class, 'store'] )->name('upcominevents-create');
    Route::get('/upcomingevents', [App\Http\Controllers\UpcomingEventsController::class, 'index'] )->name('upcomingevents');
    Route::get('/upcomingevents-show/{id}', [App\Http\Controllers\UpcomingEventsController::class, 'show'] )->name('upcomingevents-show');
    Route::patch('/upcomingevents-update/{id}', [App\Http\Controllers\UpcomingEventsController::class, 'update'] )->name('upcomingevents-update');
    Route::delete('/upcomingevents-destroy/{id}', [App\Http\Controllers\UpcomingEventsController::class, 'destroy'] )->name('upcomingevents-destroy');
    //end


/**
 * Projects routes
 */

    Route::get('/project', function () {  return view('server.projects.create'); })->name('project');
    Route::post('/project-create', [App\Http\Controllers\ProjectsController::class, 'store'] )->name('project-create');
    Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index'] )->name('projects');
    Route::get('/project-show/{id}', [App\Http\Controllers\ProjectsController::class,'show'] )->name('project-show');
    Route::patch('/project-update/{id}', [App\Http\Controllers\ProjectsController::class, 'update'] )->name('project-update');
    Route::delete('/project-destroy/{id}', [App\Http\Controllers\ProjectsController::class, 'destroy'] )->name('project-destroy');
    //end

    /**
     * post routes
     */
    Route::get('/post', function () {  return view('server.post.create'); })->name('post');
    Route::post('/post-create', [App\Http\Controllers\PostController::class, 'store'] )->name('post-create');
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'] )->name('posts');
    Route::get('/post-show/{id}', [App\Http\Controllers\PostController::class, 'show'] )->name('post-show');
    Route::patch('/post-update/{id}', [App\Http\Controllers\PostController::class, 'update'] )->name('post-update');
    Route::delete('/post-destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'] )->name('post-destroy');
    //end

/**
 * REGISTRATION
 */
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store'] )->name('register');

//end
