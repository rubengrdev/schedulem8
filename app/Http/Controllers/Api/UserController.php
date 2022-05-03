<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\f;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->email;
        $getUser =   User::where('email',$email) -> first();
        if($getUser != null){
            return $getUser;
        }
        return  "{ 'message': 'not found'}";
    }

}
