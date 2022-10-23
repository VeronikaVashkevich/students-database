<?php 

namespace App\Services;

use App\Models\Group;

class GroupService extends Service {

    public function createGroup($request) {
        return Group::create($request->validated());
    }

    public function updateGroup($request, $group) {
        return $group->update($request->validated());
    }

    public function deleteGroup($group) {
        $group->delete();
    }

}