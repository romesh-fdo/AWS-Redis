<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function set_session(Request $request, $value)
    {
        $request->session()->put('ss', $value);
        dd('Session ss is : '.session()->get('ss'));
    }

    public function delete_session()
    {
        Session::forget('ss');
        dd('Session ss is : '.session()->get('ss'));
    }
}
