<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function showCollection(User $user)
    {
        $user->load('media');

        return new UserResource($user);
    }
}
