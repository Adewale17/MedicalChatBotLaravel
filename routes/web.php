<?php

use App\Http\Controllers\OpenRouterChatController;
use App\Livewire\LandingPage;
use App\Livewire\User\Auth\SignIn;
use App\Livewire\User\Auth\SignUp;

use App\Livewire\Doctor\Auth\Login as DoctorLogin;
use App\Livewire\Doctor\Dashboard\Index as DoctorDashboard;
use App\Livewire\Doctor\Dashboard\ScheduleManager as DoctorScheduleManager;


use App\Livewire\User\Dashboard\BookAppointment;
use App\Livewire\User\Dashboard\ChatBot;
use App\Livewire\User\Dashboard\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class)->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/', LandingPage::class)->name('landing');
    Route::get('/register', SignUp::class)->name('register');
    Route::get('/login', SignIn::class)->name('login');
    Route::get('/doctor/login', action: DoctorLogin::class)->name('doctor.login');


    // Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {

    Route::get('logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    Route::get('/chatbot', function () {
        return view('components.layouts.user.chatbot'); // or Livewire component
    });
    Route::post('/chat', [OpenRouterChatController::class, 'chat'])->name('chat.send');

});

Route::prefix('doctor')->name('doctor.')->group(function () {

    Route::middleware('auth:doctor')->group(function () {
        Route::get('dashboard', DoctorDashboard::class)
            ->name('dashboard');
        Route::get('schedule', DoctorScheduleManager::class)
            ->name('schedule');
    });


});

Route::middleware(['auth'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', Index::class)->name('dashboard');

    Route::get('/appointments', BookAppointment::class)->name('dashboard.appointments');
});
