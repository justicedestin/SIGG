<?Php
use Illuminate\Support\Facades\Route;
use Jdnk\Grossesse\Http\Controllers\AntecedentPariteController;
use Jdnk\Grossesse\Http\Controllers\GrossesseController;
use Jdnk\Grossesse\Http\Controllers\AntecedentObstetricauxController;


    Route::prefix("grossesses")->controller(GrossesseController::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('store', 'store');
        Route::delete('{id}/destroy', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

    Route::prefix("AntedantParite")->controller(AntecedentPariteController::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('store', 'store');
        Route::delete('{id}/destroy', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

    Route::prefix("AntecedantObstricaux")->controller(AntecedentObstetricauxController::class)->group(function(){
        Route::get("/","index");
        Route::get('create', 'create');
        Route::post('store', 'store');
        Route::delete('{id}/destroy', 'destroy');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/update', 'update');
    });

