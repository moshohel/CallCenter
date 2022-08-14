<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/live', [AdminController::class, 'live'])->name('live');
    Route::get('/callReport', [AdminController::class, 'callReport'])->name('report.call');
    Route::get('/apiCallReport', [AdminController::class, 'apiCallReport']);

    Route::get('/systemInfo', [AdminController::class, 'systemInfo']);
    Route::post('/apiLiveDashboard', [AdminController::class, 'apiLiveDashboard'])->name('apiLiveDashboard');
    Route::post('/apiLive', [AdminController::class, 'apiLive'])->name('apiLive');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('users');
    Route::get('/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/create', 'App\Http\Controllers\UserController@store')->name('user.store');
    // Route::post('/create', function () {
    //     echo '-----sduhfisfdsfh----';
    // })->name('user.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
});


Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/info', function () {
    //cpu stat
    $prevVal = shell_exec("cat /proc/stat");
    $prevArr = explode(' ', trim($prevVal));
    // print_r($prevArr);
    $prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
    $prevIdle = $prevArr[5];
    usleep(0.15 * 1000000);
    $val = shell_exec("cat /proc/stat");
    $arr = explode(' ', trim($val));
    $total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
    $idle = $arr[5];
    $intervalTotal = intval($total - $prevTotal);
    $stat['cpu'] =  intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
    $cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
    $stat['cpu_model'] = strstr($cpu_result, "\n", true);
    $stat['cpu_model'] = str_replace("model name    : ", "", $stat['cpu_model']);

    $cpuUses = shell_exec("top -bn2 | grep '%Cpu' | tail -1 | grep -P '(....|...) id,'|awk '{print  100-$8 }'");
    $upTime = shell_exec("uptime");
    $upTimeArr = explode(' ', trim($upTime));
    $stat['up_time'] = $upTimeArr[2] . ' days';
    $stat['cpu_use_percentage'] = $cpuUses . ' %';
    // print_r($upTime);
    // echo "<br>";
    // print_r('Server Up time : ' . $upTimeArr[2] . ' ' . $upTimeArr[3]);
    //    dd($upTime);
    //memory stat
    $stat['mem_percent'] = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
    $mem_result = shell_exec("cat /proc/meminfo | grep MemTotal");
    $stat['mem_total'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
    $mem_result = shell_exec("cat /proc/meminfo | grep MemFree");
    $stat['mem_free'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
    $stat['mem_used'] = $stat['mem_total'] - $stat['mem_free'];
    //hdd stat
    $stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
    $stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024 / 1024, 2);
    $stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
    $stat['hdd_percent'] = round(sprintf('%.2f', ($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);
    //network stat
    // $stat['network_rx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes")) / 1024/ 1024/ 1024, 2);
    // $stat['network_tx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")) / 1024/ 1024/ 1024, 2);
    //output headers
    header('Content-type: text/json');
    header('Content-type: application/json');
    //output data by json
    echo
    "{  \"up_time\": " . $stat['up_time'] . ",
        \"cpu_use_percentage\": " . $stat['cpu_use_percentage'] . ",
        \"mem_percent\": " . $stat['mem_percent'] . ", \"mem_total\":" . $stat['mem_total'] . ", \"mem_used\":" . $stat['mem_used'] . ", \"mem_free\":" . $stat['mem_free'] . //mem stats
        ", \"hdd_free\":" . $stat['hdd_free'] . ", \"hdd_total\":" . $stat['hdd_total'] . ", \"hdd_used\":" . $stat['hdd_used'] . ", \"hdd_percent\":" . $stat['hdd_percent'] . ", " . //hdd stats

        "}";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
