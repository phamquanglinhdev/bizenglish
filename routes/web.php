    <?php

use App\Http\Controllers\apps\DashboardController;
use App\Http\Controllers\apps\LogController;
use App\Http\Controllers\apps\RoomController;
use App\Http\Controllers\apps\StudentController;
use App\Http\Controllers\apps\TeacherController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourseFrontendController;
use App\Http\Controllers\Filter;
use App\Http\Controllers\FrontendPageController;
use App\Http\Controllers\ListPostFrontendController;
use App\Http\Controllers\ListTeacherController;
use App\Http\Controllers\PostFrondendController;
use App\Http\Controllers\PreviewCourseController;
use App\Http\Controllers\SaveCustomerController;
use App\Http\Controllers\TagFrontendController;
use App\Http\Controllers\TeacherFrontendController;
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
})->name('index');
Route::get('/tag/',[TagFrontendController::class,'index'])->name('tag');
Route::get('/course/{slug}',[CourseFrontendController::class,'index','id'])->where(
    ['slug']
)->name('course');
Route::get('/post/{slug}',[PostFrondendController::class,'index','id'])->where(
    ['slug']
)->name('post');
Route::get('/teacher/{id}',[TeacherFrontendController::class,'index','id'])->where(
    ['id']
)->name('teacher');
Route::get('/teachers/{type}',[ListTeacherController::class,'makeData','type'])->where(
    ['type']
)->name('teachers');
Route::get('posts/{slug}',[ListPostFrontendController::class,'index','id'])->where(
    ['slug']
)->name('posts');
Route::get('/booking/{key}',[BookingController::class,'index','id'])->where(
    ['key']
)->name('booking');
Route::get('/preview/{url}',[PreviewCourseController::class,'index','id'])->where(
    ['url']
)->name('preview');
Route::post('/',[SaveCustomerController::class,'save'])->name('save.customer');
Route::post('/teacher/{id}',[TeacherFrontendController::class,'save'])->name('save.comment');
Route::get('/teacher/{teacher}/delete/{id}',[TeacherFrontendController::class,'delete',['teacher','id']])->where(['teacher','id'])->name('delete.comment');
Route::get('page/{type}',[FrontendPageController::class,'getData','type'])->where(['data'])->name('page');
Route::any('/teachers/',[Filter::class,'index'])->name('filter');

Route::group(['prefix'=>'apps','middleware'=>'app'], function () {
    Route::get("/dashboard",[DashboardController::class,'index'])->name('app.index');
    //Log
    Route::get('/log',[LogController::class,'index'])->name("app.log.list");
    Route::get('/log/create',[LogController::class,'create'])->name("app.log.create");
    Route::post('/log/store',[LogController::class,'store'])->name("app.log.store");
    //End Log
    Route::get('/room',[RoomController::class,'index'])->name("app.room.list");
    Route::get('/room/create/',[RoomController::class,'create'])->name("app.room.create");
    Route::post('/room/store/',[RoomController::class,'store'])->name("app.room.store");
    Route::get('/room/edit/{id}',[RoomController::class,'edit'])->name("app.room.edit");
    Route::delete('/room/{id}',[RoomController::class,'delete','id'])->name("app.room.destroy");
    //student
    Route::resource('/student', StudentController::class);
    Route::resource('/teacher', TeacherController::class);
});
