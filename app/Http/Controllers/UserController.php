<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Bisa disesuaikan
        return view('admin.users.index', compact('users'));
    }
}
