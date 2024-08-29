<?Php

use App\Http\Controllers\AntecedentObstetricauxController;
use Illuminate\Support\Facades\Route;
use Jdnk\Grossesse\Http\Controllers\GrossesseController as ControllersGrossesseController;
use Jdnk\Grossesse\Models\AntecedentObstetricaux;


    Route::prefix("grossesses")->controller(ControllersGrossesseController::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('users', 'store');
        Route::delete('{id}', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

    Route::prefix("AntedantParite")->controller(AntecedentObstetricaux::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('users', 'store');
        Route::delete('{id}', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

    Route::prefix("AntecedantObstricaux")->controller(AntecedentObstetricauxController::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('users', 'store');
        Route::delete('{id}', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

