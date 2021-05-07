<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::post('details', ['as' => 'details', 'uses' => 'TripsController@search']);

Route::get('search_result', ['as' => 'search_result', 'uses' => 'TripsController@search']);

Route::get('details', ['as' => 'details', 'uses' => 'TripsController@details']);

Route::resource('trip', 'TripsController');


//getting data from json file and storing it in the database
Route::get('/details', function(){
    $path = storage_path() . "/recent.json";
    $json = file_get_contents(storage_path('recent.json'));

    $objs = json_decode($json,true);
    foreach ($objs as $obj)  {
        foreach ($obj as $key => $value) {
            $insertArr[$key] = $value;
        }
        DB::table('trips')->insert($insertArr);
    }
    echo "Finished adding data in the trips table";
});

