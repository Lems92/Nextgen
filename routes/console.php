<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

<<<<<<< HEAD
<<<<<<< HEAD
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
=======
=======
>>>>>>> 40fc94a (Initial commit)
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
