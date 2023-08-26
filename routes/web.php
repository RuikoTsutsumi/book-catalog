<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BookmarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// //管理画面系・マイページ系のファイル呼び出し
// include __DIR__ . '/admin.php';
// include __DIR__ . '/mypage.php';


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'top'])->name('top');
Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'addPage'])->middleware(['auth', 'admin']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add'])->middleware(['auth', 'admin']);
    Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy')->middleware(['auth', 'admin']);
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit')->middleware(['auth', 'admin']);
    Route::post('/update', [App\Http\Controllers\ItemController::class, 'update'])->middleware(['auth', 'admin']);
    Route::get('/detail/{id}/', [App\Http\Controllers\ItemController::class, 'detail']); // 詳細
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search']); // 検索
    Route::group(['middleware' => ['auth']], function () {
    });
    
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/items', ItemController::class);
Route::post('/items/{item}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
Route::delete('/items/{item}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
Route::get('/bookmarks', [itemController::class, 'bookmark_items'])->name('bookmarks');

