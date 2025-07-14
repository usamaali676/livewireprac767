<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeavesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\HolidayCycleController;
use App\Http\Controllers\SecurityController;
use App\Models\Department;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Middleware\FinancePermission;
use App\Http\Controllers\FineController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\AttandanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SalryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReportController;
use App\Http\Livewire\TaskKanban;

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

Route::get('/tasks/kanban', function () {
    return view('task.board');
})->name('tasks.kanban');


Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
    // $exitCodes = Artisan::call('route:cache');
     return 'Config cache cleared';
 });

Route::get('/', function () {
   return redirect()->route('home');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/paidleaves', [LeavesController::class, 'paidleaves'])->name('paidleaves');

Auth::routes([
    'register' => false,
]);
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/report-upload', [ClientController::class, 'uploadreport'])->name('report-upload');
Route::controller(RoleController::class)
    ->prefix('role')
    ->as('role.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
Route::controller(UserController::class)
    ->prefix('user')
    ->as('user.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}','destroy')->name('delete');
    });
Route::controller(DepartmentController::class)
    ->prefix('dept')
    ->as('dept.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/detail/{id}', 'show')->name('detail');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}','destroy')->name('delete');
    });
    Route::controller(DesignationController::class)
        ->prefix('desig')
        ->as('desig.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });
    Route::controller(VehicleController::class)
        ->prefix('vehicle')
        ->as('vehicle.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });
    Route::controller(LeavesController::class)
        ->prefix('leave')
        ->as('leave.')
        ->middleware('ReuseableMiddleware')
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/detail/{id}', 'show')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
            Route::get('delete/{id}','destroy')->name('delete');
        });
        Route::controller(SalesController::class)
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('sales', 'index')->name('sales');
        Route::get('sale-closed', 'closeindex')->name('closed-sales');
        Route::post('file-import',  'import')->name('file-import');
        Route::get('client/add', 'create')->name('sales.create');
        Route::post('client/add','store')->name('sales.store');
        Route::get('client-detail/{id}',  'show')->name('sale-datail');
        Route::get('client/edit/{id}', 'edit')->name('sales.edit');
        Route::post('sale/update/{id}', 'update')->name('sales.update');
        Route::get('sale/delete/{id}', 'destroy')->name('sales.delete');
        Route::get('sale/conf-delete/{id}', 'delete')->name('sales.conf-delete');
        Route::get('sale/export', 'export')->name('export');

    });
    Route::controller(CommentController::class)
    ->prefix('comment')
    ->as('cmnt.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('add/{id}', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::controller(HolidayCycleController::class)
    ->prefix('holiday')
    ->as('holiday.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('sale/conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::controller(SecurityController::class)
    ->prefix('security')
    ->as('security.')
    ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::controller(FineController::class)
    ->prefix('fine')
    ->as('fine.')
    ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(AdvanceController::class)
    ->prefix('advance')
    ->as('advance.')
    ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::controller(SalryController::class)
    ->prefix('salary')
    ->as('salary.')
    ->middleware('FinancePermission')
    ->group(function () {
        // Ajax
        Route::get('getuser' , 'getuser')->name('getuser');
        Route::get('getsecurity' , 'getsecurity')->name('getsecurity');
        Route::get('index', 'index')->name('index');
        Route::get('add/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(ServiceController::class)
    ->prefix('service')
    ->as('service.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });


    Route::controller(ClientController::class)
    ->prefix('clients')
    ->as('clients.')
    ->middleware('ReuseableMiddleware')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('add/{id}', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(TaskController::class)
    ->prefix('task')
    ->as('task.')
    ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('board', 'board')->name('board');
        Route::get('add/{client}', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
        Route::get('status-update', 'updateStatus')->name('status_update');
    });

    Route::controller(ReportController::class)
    ->prefix('reports')
    ->as('reports.')
    // ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index/{client}', 'index')->name('index');
        Route::get('add/{client}', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('detail/{id}',  'show')->name('detail');
        Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });


    Route::controller(AttandanceController::class)
    ->prefix('attendance')
    ->as('attendance.')
    // ->middleware('FinancePermission')
    ->group(function () {
        Route::get('index/', 'index')->name('index');
        // Route::get('/export/excel')
        // Route::get('add/{client}', 'create')->name('create');
        // Route::post('store', 'store')->name('store');
        // Route::get('edit/{id}', 'edit')->name('edit');
        // Route::post('update/{id}', 'update')->name('update');
        // Route::get('detail/{id}',  'show')->name('detail');
        // Route::get('conf-delete/{id}', 'delete')->name('conf-delete');
        // Route::get('delete/{id}', 'destroy')->name('delete');
    });

    // Ajax




// Route::controller(SalesController::class)
//     ->middleware('SheetPermission')
//     ->group(function () {
//         Route::get('sales', 'index')->name('sales');
//         Route::get('sale-closed', 'closeindex')->name('closed-sales');
//         Route::post('file-import',  'import')->name('file-import');
//         Route::get('client/add', 'create')->name('sale.create');
//         Route::post('client/add','store')->name('sale.store');
//         Route::get('client-detail/{id}',  'show')->name('sale-datail');
//         Route::get('client/edit/{id}', 'edit')->name('sale.edit');
//         Route::post('sale/update/{id}', 'update')->name('sale.update');
//         Route::get('sale/delete/{id}', 'destroy')->name('sale.delete');
//         Route::get('sale/conf-delete/{id}', 'delete')->name('sale.conf-delete');
//         Route::get('sale/export', 'export')->name('export');

//     });
//     Route::controller(CommentController::class)
//     ->prefix('comment')
//     ->as('cmnt.')
//     ->middleware('CommentsPermissions')
//     ->group(function () {
//         Route::get('add/{id}', 'create')->name('create');
//         Route::post('store', 'store')->name('store');
//         Route::get('edit/{id}', 'edit')->name('edit');
//         Route::post('update/{id}', 'update')->name('update');
//         Route::get('delete/{id}', 'destroy')->name('delete');
//     });
