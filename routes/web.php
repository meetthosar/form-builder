<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['can:manage form']], function (){
    Route::get('/form-builder/{user}', function (\App\Models\User $user){
        return view('livewire.form-builder.form.index',['operation' => 'listing', 'user' => $user]);
    })->name('forms.listing');
    Route::get('/form-builder/create/{user}', function (\App\Models\User $user){
        return view('livewire.form-builder.form.index',['operation' => 'create', 'user' => $user]);
    })->name('forms.create');

    Route::get('/form-builder/create/{user}/{form}', function (\App\Models\User $user){
        return view('livewire.form-builder.form.index',['operation' => 'update', 'user' => $user]);
    })->name('forms.update');

    Route::get('/form-builder/view-data/{form_unique_id}', function ($form_unique_id) {
        return view('livewire.form-builder.form.index',['operation' => 'view', 'form_unique_id' => $form_unique_id]);
    });

});

Route::group(['middleware' => ['can:fill form']], function (){
    Route::get('form/{form_unique_id}', function ($form_unique_id){

    });
});

require __DIR__.'/auth.php';
