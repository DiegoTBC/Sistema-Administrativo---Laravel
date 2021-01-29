<?php

namespace App\Providers;

use App\Models\MovimentosFinanceiro;
use App\MovimentosEstoque;
use App\Observers\MovimentosEstoqueObserver;
use App\Observers\MovimentosFinanceiroObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        MovimentosEstoque::observe(MovimentosEstoqueObserver::class);
        MovimentosFinanceiro::observe(MovimentosFinanceiroObserver::class);
    }
}
