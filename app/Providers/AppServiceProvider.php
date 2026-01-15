<?php

namespace App\Providers;

use App\Models\Obat;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (str_contains(request()->getHost(), 'ngrok-free.app')) {
        URL::forceScheme('https');
    }
        View::composer('*', function ($view) {
            $stokWarning = Obat::select(
                    'obat.id_obat',
                    'obat.nama_obat',
                    'obat.stok_min',
                    DB::raw('COALESCE(SUM(batch_obat.qty_stok),0) as total_stok')
                )
                ->leftJoin('batch_obat', 'batch_obat.id_obat', '=', 'obat.id_obat')
                ->groupBy('obat.id_obat', 'obat.nama_obat', 'obat.stok_min')
                ->havingRaw('COALESCE(SUM(batch_obat.qty_stok),0) <= obat.stok_min')
                ->get();

            $view->with('stokWarning', $stokWarning);
        });
    }
}
