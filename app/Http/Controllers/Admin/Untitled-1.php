<?php
/*middleware*/
php artisan make:middleware isAdmin

if(auth()->user()->role != "admin"){
    abort(403);
}

'isadmin'=>\App\Http\Middleware\isAdmin::class,




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});