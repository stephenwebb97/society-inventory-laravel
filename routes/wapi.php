<?php



Route::apiResources([
    'assets' => 'AssetsController'
]);

$BoardGamePrefixs = [
    'boardgameprovider',
    'bgp'
];

foreach ($BoardGamePrefixs as $boardGamePrefix){
    Route::prefix($boardGamePrefix)->group(function (){
        Route::get("/","BoardGameProviderController@index");
        Route::get("/{id}","BoardGameProviderController@get_provider");
        Route::get("/{id}/search","BoardGameProviderController@search");
        Route::get("/{id}/get","BoardGameProviderController@get");
    });
}

