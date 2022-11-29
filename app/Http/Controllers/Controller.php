<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function set_session(Request $request, $value)
    {
        $request->session()->put('ss', $value);
        //dd('Session ss is : '.session()->get('ss')."\n");
        // dd('All Sessions : '.Redis::connection('session')->keys('*'));
        $keys = array_map(fn($key) => str_replace('laravel_database_', '', $key), Redis::keys('*'));
        $data = array_map(fn($data) => unserialize(unserialize($data)), Redis::mget($keys));
        echo '<pre>';
        var_dump('Session ss is : '.session()->get('ss')."\n");
        var_dump('Session ss2 is : '.session()->get('ss2')."\n");
        var_dump('Session ss3 is : '.session()->get('ss3')."\n");
        var_dump($data);
        echo '</pre>';
    }

    public function delete_session()
    {
        Session::forget('ss');
        dd('Session ss is : '.session()->get('ss'));
    }
}
