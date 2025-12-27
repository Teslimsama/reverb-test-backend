<?php

use Illuminate\Support\Facades\Route;
use App\Events\TestMessage;

Route::post('/send', function () {
    $msg = request('message', 'Hello from Laravel!');
    broadcast(new TestMessage($msg));
    return ['status' => 'sent', 'message' => $msg];
});