<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function (string $value) {
            return response()->json([
                'msg' => $value,
                'status' => 200,
            ]);
            // return Response::make(strtoupper($value));
        });

        Response::macro('error', function (string $value) {
            return response()->json([
                'msgErr' => $value,
                'status' => 201,
            ]);
            // return Response::make(strtoupper($value));
        });
    }
}
