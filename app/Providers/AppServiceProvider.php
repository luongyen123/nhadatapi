<?php

namespace App\Providers;

use App\Loaitin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->share('loaitin', Loaitin::paginate());
        view()->share('gialam', $this->getLoai("Gia Lâm"));
        view()->share('longbien', $this->getLoai("Long Biên"));
    }
    public function register()
    {
        //
    }
    protected function getLoai($ten){
        $nhadat = DB::table('xaphuong')
        ->join('quanhuyen','xaphuong.maqh','=','quanhuyen.id')
        ->select('quanhuyen.tenqh','quanhuyen.slug as qh_slug','xaphuong.tenxa','xaphuong.slug')
        ->where('quanhuyen.tenqh',$ten)
        ->get();
        return $nhadat;
    }
}
