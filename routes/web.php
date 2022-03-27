<?php

use Illuminate\Support\Facades\Route;
use App\Models\Sidebar as Sidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

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
    return view('admin.dashboard.index');
});
Route::get('/tambah-fitur', function () {
    return view('admin.dashboard.tambahFitur');
})->name('tambah.fitur');
Route::get('/features', function () {
    return view('admin.dashboard.index');
});

$sidebars = Sidebar::all();
foreach ($sidebars as $sidebar) {
    Route::get("/" . $sidebar->url,  function () use ($sidebar) {
        return view("$sidebar->view");
    });
}
Route::post('tambah-fitur/store', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:sidebars,name',
    ]);
    copy(config('view.paths')[0] . '/admin/dashboard/index.blade.php', config('view.paths')[0] . '/admin/dashboard/' . $request->name . '.blade.php');
    $request->url = '/' . $request->name;
    $view = config('view.paths')[0] . '/admin/dashboard/' . $request->name . '.blade.php';
    dd($view);
    $view = str_replace([config('view.paths')[0], '/', ".blade.php"], ["", '.', ""], $view);
    $view = ltrim($view, ".");
    $request->html = "<li class='nav-item dropdown active'>
    <a href=" . $request->url . " class='nav-link has-dropdown'><i class='fas fa-fire'></i><span>" . $request->name . "
        </span></a>
</li>";
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    $sidebar = Sidebar::create([
        'view' => $view,
        'name' => $request->name,
        'url' => $request->url,
        'html' => $request->html,

    ]);
    Artisan::call('optimize');
    return back()->with('Success', 'Success create sidebar');
});
