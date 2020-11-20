<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OutstandingItems;
use App\Contracts\Services\ZohoService;
use App\Http\Livewire\ItemChecklist;
use App\Http\Livewire\HouseSold;
use App\Http\Livewire\HouseCancelled;
use App\Http\Livewire\HouseDropout;
use App\Http\Controllers\DashBoardController;
use App\Http\Livewire\Portfolio;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\OutstandingItemsBeforeDueDiligenceTable;

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

Route::get('/clear',function (){
   Artisan::call('view:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('route:cache');
   dd('done');
});

Route::get('/', function () {
    if(!\Illuminate\Support\Facades\Auth::user())
        return view('auth.login');
    else
        return redirect('/items/outstanding/before_dd');
});
//Route::post('login', [AuthController::class,'login']);
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [DashBoardController::class,'index'])->name('dashboard');
    });



    Route::prefix('items')->group(function(){
//        Route::get('/outstanding_before_dd',[ ItemController::class, 'outstanding_before_dd']);
//        Route::get('/outstanding/{type}', OutstandingItemsBeforeDueDiligence::class);
        Route::get('/outstanding/{type}', OutstandingItems::class);
        Route::get('/checklist/{client_id}', ItemChecklist::class);
//        Route::get('/outstanding/{dd}',OutstandingItemsBeforeDd::class);
    });

    Route::get('/portfolio',Portfolio::class);
    Route::prefix('house')->group(function(){
//        Route::get('/outstanding_before_dd',[ ItemController::class, 'outstanding_before_dd']);
        Route::get('/sold', HouseSold::class);
        Route::get('/cancelled', HouseCancelled::class);
        Route::get('/dropouts', HouseDropout::class);
//        Route::get('/outstanding/{dd}',OutstandingItemsBeforeDd::class);
    });


});

Route::get('test',function (){
    $service = new ZohoService();
    dd($service->getDealByStage());
    //dd($service->getDeals());

});


