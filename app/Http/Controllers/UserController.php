<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers(){
        
        $users = User::getUsers();

        if($users){
            return response($users, 200);
        }else{
            return response('Error de conexión', 500);
        }
    }
}
