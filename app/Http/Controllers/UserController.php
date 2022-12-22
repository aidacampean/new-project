<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // get all users 
    public function index() {
        $users = User::all();
        return response()->json([
            'data' => $users
        ], 200);
    }
}
