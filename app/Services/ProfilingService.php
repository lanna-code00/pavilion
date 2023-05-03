<?php

namespace App\Services;

use App\Models\User;

class ProfilingService {
   
    function __construct(User $user)
    {
        $this->user = $user;
    }

    function createUserProfile($data, $image, User $user)
    {
        try {     
            $create_profile = $this->user->updateOrCreate(
                ['id' => $user?->id],
                array_merge($data, ['profile_image' => !(is_null($image)) ? $image : null, 'updated_at' => now()])
            );
            return $create_profile;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function fetchUsers($data)
    {
        try {
            $fetch_users = $this->user->paginateData($data);
            return $fetch_users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function fetchUser($user)
    {
        try {
            $fetch_user = $this->user->find($user?->id);
            return $fetch_user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}