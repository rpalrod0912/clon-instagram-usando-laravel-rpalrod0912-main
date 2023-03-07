<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function mostrarGente(User $user){
        return view("people", ["user"=>User::All()]
        );
    }

    
}
