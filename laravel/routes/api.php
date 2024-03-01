<?php

use Creatomate\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/videos', function () {

    $client = new Client('90657e3840b846b59759c43298154f29cd0bea87e0f62694212317eb596f15c16515c6628590c92cd37c1af6d10eb7c9');

    $renders = $client->render([
        'template_id' => '987df6b3-6f20-4d60-8b0d-884be5a03b4a',
        'modifications' => [
            'Text-1' => 'Hi! 👋 Thanks for trying out Creatomate!',
            'Text-2' => 'Change this text to anything you want. ✨🦖',
            'Video' => 'https://creatomate-static.s3.amazonaws.com/demo/video5.mp4',
        ],
    ]);

    return response()->json($renders, 200, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
});
