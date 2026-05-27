<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProgress;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }

    public function boot()
{
    Paginator::useBootstrapFive();

    View::composer('*', function ($view) {

        // ================= REFLEKSI =================
        $isRefleksiUnlocked = false;

        if (Auth::check()) {
            $isRefleksiUnlocked = UserProgress::where('user_id', Auth::id())
                ->where('materi_slug', 'refleksi_semua_materi')
                ->where('sub_materi_slug', 'refleksi')
                ->where('completed', 1)
                ->exists();
        }

        // ================= UJI KOMPETENSI =================
        $isUjiUnlocked = false;

        if (Auth::check()) {
            $isUjiUnlocked = UserProgress::where('user_id', Auth::id())
                ->where('materi_slug', 'uji_kompetensi')
                ->where('sub_materi_slug', 'uji-kompetensi')
                ->where('completed', 1)
                ->exists();
        }

        $view->with('isRefleksiUnlocked', $isRefleksiUnlocked);
        $view->with('isUjiUnlocked', $isUjiUnlocked);
    });
}
}
