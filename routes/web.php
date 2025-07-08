<?php

use App\Http\Controllers\OpenRouterChatController;
use App\Livewire\LandingPage;
use App\Livewire\User\Auth\SignIn;
use App\Livewire\User\Auth\SignUp;
use App\Livewire\User\Dashboard\ChatBot;
use App\Livewire\User\Dashboard\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class)->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/', LandingPage::class)->name('landing');
    Route::get('/register', SignUp::class)->name('register');
    Route::get('/login', SignIn::class)->name('login');

    // Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {

    Route::get('logout', function () {
        auth()->logout();
        return redirect('/');
    })->name('logout');
    Route::get('dashboard', Index::class)->name('dashboard');
    Route::get('/chatbot', function () {
        return view('components.layouts.user.chatbot'); // or Livewire component
    });
    Route::post('/chat', [OpenRouterChatController::class, 'chat'])->name('chat.send');

});
