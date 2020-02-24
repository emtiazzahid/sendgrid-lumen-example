<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/test_mail', function () {
    $data = ['test data'];
    try {
        \Illuminate\Support\Facades\Mail::send('emails.test', $data, function (\Illuminate\Mail\Message $message) {
            $message->to('emtiazzahid@gmail.com', 'Test User')
                ->from('emtiazzahid@gmail.com', 'Md Emtiaz Zahid')
                ->subject('Test Mail');
        });
    } catch (Exception $exception) {
        dd($exception->getMessage());
    }
    dd('Mail sent');
});