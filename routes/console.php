<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
<<<<<<< HEAD
})->purpose('Display an inspiring quote');
=======
})->purpose('Display an inspiring quote')->hourly();
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
