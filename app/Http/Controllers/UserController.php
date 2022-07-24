<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('index',compact('userData'));

    } // End Method 





} 
 