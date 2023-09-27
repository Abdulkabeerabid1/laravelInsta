<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        return Auth()->user()->following()->toggle($user->profile);
    }
}
