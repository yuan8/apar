<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\User;
class HelperProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public  static function update_token_api($id)
    {
       $token = Str::random(60);

       User::find($id)->forceFill([
           'api_token' => hash('sha256', $token),
       ])->save();

       return ['token' => $token];
    }


}
