<?php

use App\Http\Controllers\{Entityname}Controller;
use Illuminate\Support\Facades\Route;

Route::post('/{entitynames}', '{Entityname}Controller@store')->name('{entitynames}.store');
Route::put('/{entitynames}/{{entityname}}', '{Entityname}Controller@update')     ->name('{entitynames}.update');
Route::delete('/{entitynames}/{{entityname}}', '{Entityname}Controller@destroy') ->name('{entitynames}.destroy');
Route::get('/{entitynames}/{{entityname}}/edit', '{Entityname}Controller@edit')  ->name('{entitynames}.edit');
Route::get('/{entitynames}/create', '{Entityname}Controller@create')->name('{entitynames}.create');
Route::get('/{entitynames}/{{entityname}}', '{Entityname}Controller@show')  ->name('{entitynames}.show');
Route::get('/{entitynames}', '{Entityname}Controller@index')->name('{entitynames}.index');

//Route::resource('/{entitynames}', \{Entityname}Controller::class);
//Route::resource('{{entitynames}tynames}', '{Entityname}Controller');


