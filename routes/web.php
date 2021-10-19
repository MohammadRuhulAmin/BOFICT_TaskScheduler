<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admin\EmployeeController;
use App\http\Controllers\Admin\CommonTaskController;
use App\Http\Controllers\Admin\TaskScheduleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\SearchEmployeeTaskController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserViewDashboardController;


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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



Route::get('/redirects',[CommonTaskController::class,'redirectUser']); 
Route::middleware(['auth:sanctum'])->group(function(){
     Route::prefix('admin')->group(function(){
     Route::get('dashboard/employee-today-Task',[DashBoardController::class,'todayEmployeeTask'])->name('dashboard.todayTask');
     Route::get('dashboard/employee-week-Task',[DashBoardController::class,'weekEmployeeTask'])->name('dashboard.weekTask');
     Route::resource('employees',EmployeeController::class);
     Route::resource('tasks',TaskScheduleController::class);
     Route::resource('assigntasks',TaskController::class);
     Route::get('assigntasks/search-employee-work-details',[TaskController::class,'employeeTaskListViewPage'])->name('assigntasks.viewEmplyTaskSearch');
      });
      // Route Search Employee Information controller 
    Route::get('/admin/search-task',[SearchEmployeeTaskController::class,'searchindex'])->name('search.view');
    Route::post('/admin/search-task/',[SearchEmployeeTaskController::class,'employeeSearchTaskResult'])->name('search.sendRequest');
    Route::delete('/admin/search-task/{id}',[SearchEmployeeTaskController::class,'deleteTask']);
    Route::post('/admin/search-task/update/{id}',[SearchEmployeeTaskController::class,'updateTaskInformation']);
  });

Route::get('/user/logout',[CommonTaskController::class,'logout'])->name('commonTask.logout');
Route::get('/Dashboard/weekley-dashboard',[UserViewDashboardController::class,'weekEmployeeTask']);
Route::get('/Dashboard/today-tomorrow-dashboard',[UserViewDashboardController::class,'todayTomorrowYesterdayTask']);

