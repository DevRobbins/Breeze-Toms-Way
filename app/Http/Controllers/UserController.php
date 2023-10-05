<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('users', [
            'users' => User::where('active', '=', '1')->get()->toArray()
        ]);
    }
}
