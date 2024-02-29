<?php

use Illuminate\Support\Facades\Route;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

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
Route::post('/create-meeting', function (\Illuminate\Http\Request $request) {
    $url = Bigbluebutton::start([
            'meetingID' => rand(10, 100000),
            'meetingName' => $request->meeting,
            'moderatorPW' => 'moderator', //moderator password set here
            'attendeePW' => 'attendee', //attendee password here
            'userName' => $request->name,//for join meeting
            //'redirect' => false // only want to create and meeting and get join url then use this parameter
        ]);

        return redirect()->to($url);
})->name('create_meet');
