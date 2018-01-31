<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert(Request $req){
        $username = $req->input('username');

        $data = array('username'=>$username);
        \DB::table('user')->insert(
            ['username' => $username,'create_user'=>base64_encode($username)]
        );
        echo'OK';
    }
}

