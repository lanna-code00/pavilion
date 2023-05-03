<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfilingFormRequest;
use App\Http\Resources\UserProfilingResource;
use App\Mail\ProfilingMail;
use App\Mixins\ResponseMixin;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use App\Services\ProfilingService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfilingController extends Controller
{
    function __construct(ProfilingService $profilingService)
    {
        $this->profilingService = $profilingService;
    }

    function createUserProfile(UserProfilingFormRequest $request, User $user)
    {
        $image = $request->hasFile('profile_image') ? cloudinary()->upload($request->file('profile_image')->getRealPath())->getSecurePath() : $request->profile_image; 
        $create_profile = $this->profilingService->createUserProfile($request->validated(), $image, $user);
        Mail::to($create_profile?->email)->send(new ProfilingMail($create_profile));
        return Response::createdResponse("User Profile Created", new UserProfilingResource($create_profile));
    }

    function fetchUsers(Request $request, User $user)
    {
       $fetch_users = $this->profilingService->fetchUsers($request, $user);
       return UserProfilingResource::collection($fetch_users);
    }

    function fetchUser(User $user) 
    {
        $fetch_user = $this->profilingService->fetchUser($user);
        return UserProfilingResource::make($fetch_user);
    }
}
