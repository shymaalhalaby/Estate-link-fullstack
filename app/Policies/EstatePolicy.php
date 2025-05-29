<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Estate;
use Illuminate\Auth\Access\Response;

class EstatePolicy
{
    public function update(User $user, Estate $estate)
{
    return $user->id === $estate->user_id;
}

public function delete(User $user, Estate $estate)
{
    return $user->id === $estate->user_id;
}

}
