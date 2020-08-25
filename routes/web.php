<?php



Route::get('admin', function () {
    return view('admin');
});


Route::get('/', function () {
    return view('index');
});

Route::get('/{vue_capture?}',function () {
	    return view('admin');
	})->where('vue_capture', '[\/\w\.-]*');


