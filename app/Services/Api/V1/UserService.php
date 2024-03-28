<?php

namespace App\Services\Api\V1;

use App\Models\UniversityProgramFavourite;
use App\Models\User;
use App\Services\FileService;

class UserService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(array $data): User
    {
        return User::query()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'middle_name' => $data['middle_name'] ?? null,
            'phone' => $data['phone'],
            'password' => $data['password']
        ])->assignRole('user');
    }

    public function updateProfile(User $user, array $data)
    {
        $image = null;
        if (isset($data['image'])) {
            $image = $this->fileService->saveFile($data['image'], User::IMAGE_PATH, $user->image);
        }

        return $user->update([
            'name' => $data['name'],
            'image' => $image
        ]);
    }

    public function updateProfileImage($user, array $data)
    {
        return $user->update([
            'profile_image_id' => $data['profile_image_id']
        ]);
    }

    public function updatePassword(User $user, array $data)
    {
        $user->password = $data['password'];
        $user->save();
        return $user->refresh();
    }

    public function updatePassword2(User $user, array $data)
    {
        $user->password = $data['password'];
        $user->save();
        return $user->refresh();
    }

    public function addPostFavourite(array $data)
    {
        return UniversityProgramFavourite::query()->updateOrCreate([
            'user_id' => auth()->id(),
            'university_program_id' => $data['university_program_id']
        ], [
            'user_id' => auth()->id(),
            'university_program_id' => $data['university_program_id']
        ]);
    }

}
