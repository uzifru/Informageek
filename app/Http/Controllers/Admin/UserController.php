<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Spatie\Permission\Moddel\Role;

class UserController extends Controller
{
    public function index(){

        $data = [ 'users' => User::orderBy('id','DESC')->get()
        ];
        return view('backend.admin.user.index',$data);
    }
}
