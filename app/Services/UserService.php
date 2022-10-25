<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService extends Service {
    
    protected function getDataForSave($request) {
        return array_merge(
            $request->validated(),
            ['password' => Hash::make($request->password)]
        );
    }

    public function createUser($request) {
        $user = User::create($this->getDataForSave($request));
        $user->assignRole('methodist');

        return $user;
    }

    public function updateUser($user, $request) {
        return $user->update($this->getDataForSave($request));
    }

    public function deleteUser($user) {
        $user->delete();
    }

}