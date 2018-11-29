<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Carbon\carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //got to the database 
        //return the detail of the setting
        $currentTime = Carbon::now();
        $setting = Setting::find(1);

        View::share('getViewSetting',$setting);
       //check for nomiantion period 
        if ($currentTime->gt($setting->nomination_start_date) && $currentTime->lt($setting->nomination_end_date)) {

            # Return true if cureent time is between nomination date
            View::share('isWithinNominationPeriod', 'yes');
            View::share('isWithinVottingPeriod', 'no');
        }else{

            View::share('isWithinNominationPeriod', 'no');
            View::share('isWithinVottingPeriod', 'no');

            //Check to see if it is within votting period 
        if ($currentTime->gt($setting->voting_start_date) && $currentTime->lt($setting->voting_end_date)){

            # Return true if cureent time is between nomination date
            view()->share('isWithinVottingPeriod', 'yes');
        }
        }

   


        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
